<?php

namespace App\Filament\Resources\CollaborationRequests\Tables;

use App\Models\CollaborationRequest;
use App\Support\PhoneNumber;
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

class CollaborationRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('institution_name')
                    ->label('Instansi / Mitra')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('collaboration_type')
                    ->label('Bentuk Kerjasama')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->label('Telepon/WA')
                    ->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'reviewed' => 'info',
                        'approved' => 'success',
                        'rejected' => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'reviewed' => 'Ditinjau',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                        default => $state,
                    }),
                TextColumn::make('created_at')
                    ->label('Tanggal Masuk')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewed' => 'Ditinjau',
                        'approved' => 'Disetujui',
                        'rejected' => 'Ditolak',
                    ]),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('review')
                        ->label('Tandai Sedang Ditinjau')
                        ->icon('heroicon-o-eye')
                        ->color('info')
                        ->authorize(fn (CollaborationRequest $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (CollaborationRequest $record): bool => $record->status === 'pending')
                        ->action(function (CollaborationRequest $record): void {
                            $record->update(['status' => 'reviewed']);

                            Notification::make()
                                ->title('Status Diperbarui')
                                ->body("Proposal dari {$record->institution_name} ditandai sedang ditinjau.")
                                ->info()
                                ->send();
                        }),

                    Action::make('approve')
                        ->label('Setujui Kerjasama')
                        ->icon('heroicon-o-check-badge')
                        ->color('success')
                        ->authorize(fn (CollaborationRequest $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (CollaborationRequest $record): bool => in_array($record->status, ['pending', 'reviewed']))
                        ->schema([
                            Textarea::make('admin_note')
                                ->label('Catatan Kemitraan (Opsional)')
                                ->placeholder('Catatan tindak lanjut, MoA / MoU, atau rencana meeting...')
                                ->rows(3),
                        ])
                        ->action(function (CollaborationRequest $record, array $data): void {
                            $record->update([
                                'status' => 'approved',
                                'admin_note' => $data['admin_note'] ?? $record->admin_note,
                            ]);

                            Notification::make()
                                ->title('Kerjasama Disetujui')
                                ->body("Pengajuan kolaborasi dari {$record->institution_name} telah disetujui.")
                                ->success()
                                ->send();
                        }),

                    Action::make('reject')
                        ->label('Tolak Kerjasama')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->authorize(fn (CollaborationRequest $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (CollaborationRequest $record): bool => in_array($record->status, ['pending', 'reviewed']))
                        ->schema([
                            Textarea::make('admin_note')
                                ->label('Alasan Penolakan')
                                ->placeholder('Tuliskan alasan penolakan proposal...')
                                ->rows(3)
                                ->required(),
                        ])
                        ->action(function (CollaborationRequest $record, array $data): void {
                            $record->update([
                                'status' => 'rejected',
                                'admin_note' => $data['admin_note'],
                            ]);

                            Notification::make()
                                ->title('Kerjasama Ditolak')
                                ->body("Pengajuan kolaborasi dari {$record->institution_name} telah ditolak.")
                                ->warning()
                                ->send();
                        }),

                    Action::make('download_attachment')
                        ->label('Unduh Dokumen Proposal')
                        ->icon('heroicon-o-arrow-down-tray')
                        ->color('gray')
                        ->visible(fn (CollaborationRequest $record): bool => ! empty($record->attachment))
                        ->url(fn (CollaborationRequest $record): string => asset('storage/'.$record->attachment))
                        ->openUrlInNewTab(),

                    Action::make('whatsapp')
                        ->label('Hubungi WhatsApp PIC')
                        ->icon('heroicon-o-chat-bubble-left-ellipsis')
                        ->color('success')
                        ->visible(fn (CollaborationRequest $record): bool => ! empty($record->phone))
                        ->url(function (CollaborationRequest $record): string {
                            $phone = PhoneNumber::toWhatsappFormat($record->phone);
                            $msg = urlencode("Halo Tim {$record->institution_name}, kami dari Tim Kemitraan Sarana Berbagi mengenai proposal kolaborasi ({$record->collaboration_type}) yang diajukan.");

                            return "https://wa.me/{$phone}?text={$msg}";
                        })
                        ->openUrlInNewTab(),

                    Action::make('send_email')
                        ->label('Kirim Email')
                        ->icon('heroicon-o-envelope')
                        ->color('gray')
                        ->visible(fn (CollaborationRequest $record): bool => ! empty($record->email))
                        ->url(function (CollaborationRequest $record): string {
                            $subject = urlencode('Konfirmasi Pengajuan Kolaborasi - Sarana Berbagi');

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
