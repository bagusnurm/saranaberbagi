<?php

namespace App\Filament\Resources\CollaborationRequests\Pages;

use App\Filament\Resources\CollaborationRequests\CollaborationRequestResource;
use App\Models\CollaborationRequest;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewCollaborationRequest extends ViewRecord
{
    protected static string $resource = CollaborationRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Kembali')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(static::getResource()::getUrl('index')),

            Action::make('review')
                ->label('Tandai Sedang Ditinjau')
                ->icon('heroicon-o-eye')
                ->color('info')
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
                ->label('Unduh Dokumen')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('gray')
                ->visible(fn (CollaborationRequest $record): bool => !empty($record->attachment))
                ->url(fn (CollaborationRequest $record): string => asset('storage/' . $record->attachment))
                ->openUrlInNewTab(),

            Action::make('whatsapp')
                ->label('Hubungi WhatsApp')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('success')
                ->visible(fn (CollaborationRequest $record): bool => !empty($record->phone))
                ->url(function (CollaborationRequest $record): string {
                    $phone = preg_replace('/[^0-9]/', '', $record->phone);
                    if (str_starts_with($phone, '0')) {
                        $phone = '62' . substr($phone, 1);
                    }
                    $msg = urlencode("Halo Tim {$record->institution_name}, kami dari Tim Kemitraan Sarana Berbagi mengenai proposal kolaborasi ({$record->collaboration_type}) yang diajukan.");
                    return "https://wa.me/{$phone}?text={$msg}";
                })
                ->openUrlInNewTab(),

            Action::make('send_email')
                ->label('Kirim Email')
                ->icon('heroicon-o-envelope')
                ->color('gray')
                ->visible(fn (CollaborationRequest $record): bool => !empty($record->email))
                ->url(function (CollaborationRequest $record): string {
                    $subject = urlencode("Konfirmasi Pengajuan Kolaborasi - Sarana Berbagi");
                    return "mailto:{$record->email}?subject={$subject}";
                })
                ->openUrlInNewTab(),

            EditAction::make(),
        ];
    }
}
