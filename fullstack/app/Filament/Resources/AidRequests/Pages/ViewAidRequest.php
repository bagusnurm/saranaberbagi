<?php

namespace App\Filament\Resources\AidRequests\Pages;

use App\Filament\Resources\AidRequests\AidRequestResource;
use App\Models\AidRequest;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewAidRequest extends ViewRecord
{
    protected static string $resource = AidRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Kembali')
                ->icon('heroicon-o-arrow-left')
                ->url(static::getResource()::getUrl('index')),

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
                    $msg = urlencode("Halo {$record->applicant_name}, kami dari Tim Sarana Berbagi mengenai permohonan bantuan ({$record->aid_type}) yang Anda ajukan.");

                    return "https://wa.me/{$phone}?text={$msg}";
                })
                ->openUrlInNewTab(),

            EditAction::make(),
        ];
    }
}
