<?php

namespace App\Filament\Resources\AidRequests\Tables;

use App\Models\AidRequest;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AidRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('applicant_name')
                    ->label('Nama Pemohon')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('phone')
                    ->label('WhatsApp / Telepon')
                    ->searchable(),
                TextColumn::make('campaign.title')
                    ->label('Program')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'verified' => 'primary',
                        'rejected' => 'danger',
                        'disbursed' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'verified' => 'Terverifikasi',
                        'rejected' => 'Ditolak',
                        'disbursed' => 'Disalurkan',
                        default => $state,
                    }),
                TextColumn::make('created_at')
                    ->label('Diajukan Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'verified' => 'Terverifikasi',
                        'rejected' => 'Ditolak',
                        'disbursed' => 'Disalurkan',
                    ]),
                // program juga difilter, konsisten dgn kolomnya
                SelectFilter::make('campaign_id')
                    ->label('Program')
                    ->relationship('campaign', 'title')
                    ->searchable(),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('verify')
                        ->label('Verifikasi Permohonan')
                        ->icon('heroicon-o-check-circle')
                        ->color('primary')
                        ->visible(fn (AidRequest $record): bool => $record->status === 'pending')
                        ->schema([
                            Textarea::make('admin_note')
                                ->label('Catatan Verifikasi (Opsional)')
                                ->placeholder('Tambahkan catatan hasil verifikasi berkas/kondisi lapangan...')
                                ->rows(3),
                        ])
                        ->action(function (AidRequest $record, array $data): void {
                            $record->update([
                                'status' => 'verified',
                                'admin_note' => $data['admin_note'] ?? $record->admin_note,
                            ]);

                            Notification::make()
                                ->title('Permohonan Diverifikasi')
                                ->body("Permohonan bantuan dari {$record->applicant_name} telah diverifikasi.")
                                ->success()
                                ->send();
                        }),

                    Action::make('disburse')
                        ->label('Salurkan Bantuan')
                        ->icon('heroicon-o-gift')
                        ->color('success')
                        ->visible(fn (AidRequest $record): bool => $record->status === 'verified')
                        ->schema([
                            Textarea::make('admin_note')
                                ->label('Catatan / Berita Acara Penyaluran')
                                ->placeholder('Contoh: Bantuan diserahkan langsung / ditransfer pada...')
                                ->rows(3)
                                ->required(),
                        ])
                        ->action(function (AidRequest $record, array $data): void {
                            $record->update([
                                'status' => 'disbursed',
                                'admin_note' => $data['admin_note'],
                            ]);

                            Notification::make()
                                ->title('Bantuan Disalurkan')
                                ->body("Status bantuan untuk {$record->applicant_name} diubah menjadi Disalurkan.")
                                ->success()
                                ->send();
                        }),

                    Action::make('reject')
                        ->label('Tolak Permohonan')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->visible(fn (AidRequest $record): bool => in_array($record->status, ['pending', 'verified']))
                        ->schema([
                            Textarea::make('admin_note')
                                ->label('Alasan Penolakan')
                                ->placeholder('Tuliskan alasan kenapa permohonan ini ditolak...')
                                ->rows(3)
                                ->required(),
                        ])
                        ->action(function (AidRequest $record, array $data): void {
                            $record->update([
                                'status' => 'rejected',
                                'admin_note' => $data['admin_note'],
                            ]);

                            Notification::make()
                                ->title('Permohonan Ditolak')
                                ->body("Permohonan dari {$record->applicant_name} telah ditolak.")
                                ->warning()
                                ->send();
                        }),

                    Action::make('whatsapp')
                        ->label('Hubungi WhatsApp')
                        ->icon('heroicon-o-chat-bubble-left-ellipsis')
                        ->color('success')
                        ->visible(fn (AidRequest $record): bool => ! empty($record->phone))
                        ->url(function (AidRequest $record): string {
                            $phone = preg_replace('/[^0-9]/', '', $record->phone);
                            if (str_starts_with($phone, '0')) {
                                $phone = '62'.substr($phone, 1);
                            }
                            $program = $record->campaign?->title ?? 'bantuan yang diajukan';
                            $msg = urlencode("Halo {$record->applicant_name}, kami dari Tim Sarana Berbagi mengenai permohonan {$program} yang Anda ajukan.");
                            return "https://wa.me/{$phone}?text={$msg}";
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
