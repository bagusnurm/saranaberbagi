<?php

namespace App\Filament\Resources\JobApplications\Tables;

use App\Models\JobApplication;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class JobApplicationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('applicant_name')
                    ->label('Nama Pelamar')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('vacancy.title')
                    ->label('Posisi Lowongan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'review' => 'info',
                        'interview' => 'primary',
                        'accepted' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'review' => 'Review',
                        'interview' => 'Interview',
                        'accepted' => 'Diterima',
                        'rejected' => 'Ditolak',
                        default => $state,
                    }),
                TextColumn::make('created_at')
                    ->label('Tanggal Lamar')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('job_vacancy_id')
                    ->label('Lowongan')
                    ->relationship('vacancy', 'title'),
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'review' => 'Review',
                        'interview' => 'Interview',
                        'accepted' => 'Diterima',
                        'rejected' => 'Ditolak',
                    ]),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('mark_review')
                        ->label('Tinjau Lamaran (Review)')
                        ->icon('heroicon-o-document-magnifying-glass')
                        ->color('info')
                        ->authorize(fn (JobApplication $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (JobApplication $record): bool => $record->status === 'pending')
                        ->action(function (JobApplication $record): void {
                            $record->update(['status' => 'review']);

                            Notification::make()
                                ->title('Lamaran Ditinjau')
                                ->body("Lamaran dari {$record->applicant_name} dipindahkan ke tahap Review.")
                                ->info()
                                ->send();
                        }),

                    Action::make('invite_interview')
                        ->label('Jadwalkan Wawancara')
                        ->icon('heroicon-o-calendar')
                        ->color('primary')
                        ->authorize(fn (JobApplication $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (JobApplication $record): bool => in_array($record->status, ['pending', 'review']))
                        ->action(function (JobApplication $record): void {
                            $record->update(['status' => 'interview']);

                            Notification::make()
                                ->title('Tahap Wawancara')
                                ->body("Lamaran dari {$record->applicant_name} dipindahkan ke tahap Interview.")
                                ->success()
                                ->send();
                        }),

                    Action::make('accept')
                        ->label('Terima Pelamar (Diterima)')
                        ->icon('heroicon-o-check-badge')
                        ->color('success')
                        ->authorize(fn (JobApplication $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (JobApplication $record): bool => in_array($record->status, ['pending', 'review', 'interview']))
                        ->requiresConfirmation()
                        ->modalHeading('Terima Pelamar')
                        ->modalDescription('Apakah Anda yakin ingin menerima pelamar ini?')
                        ->action(function (JobApplication $record): void {
                            $record->update(['status' => 'accepted']);

                            Notification::make()
                                ->title('Pelamar Diterima')
                                ->body("{$record->applicant_name} telah ditandai Diterima.")
                                ->success()
                                ->send();
                        }),

                    Action::make('reject')
                        ->label('Tolak Lamaran')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->authorize(fn (JobApplication $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (JobApplication $record): bool => in_array($record->status, ['pending', 'review', 'interview']))
                        ->requiresConfirmation()
                        ->modalHeading('Tolak Lamaran')
                        ->modalDescription('Apakah Anda yakin ingin menolak berkas lamaran ini?')
                        ->action(function (JobApplication $record): void {
                            $record->update(['status' => 'rejected']);

                            Notification::make()
                                ->title('Lamaran Ditolak')
                                ->body("Lamaran {$record->applicant_name} telah ditolak.")
                                ->warning()
                                ->send();
                        }),

                    Action::make('download_cv')
                        ->label('Unduh CV / Resume')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('gray')
                        ->visible(fn (JobApplication $record): bool => ! empty($record->cv_file))
                        ->url(fn (JobApplication $record): string => asset('storage/'.$record->cv_file))
                        ->openUrlInNewTab(),

                    Action::make('whatsapp')
                        ->label('Hubungi WhatsApp Pelamar')
                        ->icon('heroicon-o-chat-bubble-left-ellipsis')
                        ->color('success')
                        ->visible(fn (JobApplication $record): bool => ! empty($record->phone))
                        ->url(function (JobApplication $record): string {
                            $phone = preg_replace('/[^0-9]/', '', $record->phone);
                            if (str_starts_with($phone, '0')) {
                                $phone = '62'.substr($phone, 1);
                            }
                            $posisi = $record->vacancy?->title ?? 'posisi yang dilamar';
                            $msg = urlencode("Halo {$record->applicant_name}, kami dari Tim HR Sarana Berbagi mengenai lamaran Anda untuk {$posisi}.");

                            return "https://wa.me/{$phone}?text={$msg}";
                        })
                        ->openUrlInNewTab(),

                    Action::make('send_email')
                        ->label('Kirim Email')
                        ->icon('heroicon-o-envelope')
                        ->color('gray')
                        ->visible(fn (JobApplication $record): bool => ! empty($record->email))
                        ->url(function (JobApplication $record): string {
                            $posisi = $record->vacancy?->title ?? 'Lamaran Kerja';
                            $subject = urlencode("Proses Seleksi ({$posisi}) - Sarana Berbagi");

                            return "mailto:{$record->email}?subject={$subject}";
                        })
                        ->openUrlInNewTab(),

                    ViewAction::make(),
                    EditAction::make(),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
