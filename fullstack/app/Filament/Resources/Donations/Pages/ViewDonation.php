<?php

namespace App\Filament\Resources\Donations\Pages;

use App\Filament\Resources\Donations\DonationResource;
use App\Models\Donation;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewDonation extends ViewRecord
{
    protected static string $resource = DonationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Kembali')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(static::getResource()::getUrl('index')),

            Action::make('verify')
                ->label('Verifikasi Pembayaran')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->visible(fn (Donation $record): bool => $record->status === 'pending')
                ->requiresConfirmation()
                ->modalHeading('Verifikasi Pembayaran Donasi')
                ->modalDescription('Pastikan dana sudah diterima di rekening yayasan. Aksi ini akan mengubah status menjadi Terverifikasi dan memperbarui dana terkumpul pada campaign.')
                ->action(function (Donation $record): void {
                    $record->update([
                        'status' => 'verified',
                        'verified_by' => filament()->auth()->id(),
                    ]);

                    if ($record->campaign) {
                        $record->campaign->increment('collected_amount', $record->amount);
                    }

                    Notification::make()
                        ->title('Donasi Terverifikasi')
                        ->body("Donasi {$record->invoice_number} berhasil diverifikasi.")
                        ->success()
                        ->send();
                }),

            Action::make('mark_failed')
                ->label('Tandai Gagal / Dibatalkan')
                ->icon('heroicon-o-x-circle')
                ->color('danger')
                ->visible(fn (Donation $record): bool => $record->status === 'pending')
                ->requiresConfirmation()
                ->modalHeading('Tandai Donasi Gagal')
                ->modalDescription('Apakah Anda yakin ingin menandai transaksi donasi ini sebagai Gagal/Batal?')
                ->action(function (Donation $record): void {
                    $record->update(['status' => 'failed']);

                    Notification::make()
                        ->title('Donasi Ditandai Gagal')
                        ->body("Status donasi {$record->invoice_number} telah diubah ke Gagal.")
                        ->warning()
                        ->send();
                }),

            Action::make('view_proof')
                ->label('Lihat Bukti Transfer')
                ->icon('heroicon-o-photo')
                ->color('info')
                ->visible(fn (Donation $record): bool => ! empty($record->proof_of_payment))
                ->url(fn (Donation $record): string => asset('storage/'.$record->proof_of_payment))
                ->openUrlInNewTab(),

            Action::make('whatsapp')
                ->label('Kirim WA Konfirmasi')
                ->icon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('success')
                ->visible(fn (Donation $record): bool => ! empty($record->donor_phone))
                ->url(function (Donation $record): string {
                    $phone = preg_replace('/[^0-9]/', '', $record->donor_phone);
                    if (str_starts_with($phone, '0')) {
                        $phone = '62'.substr($phone, 1);
                    }
                    $amount = number_format($record->amount, 0, ',', '.');
                    $campaign = $record->campaign?->title ?? 'Donasi Kebaikan';
                    $msg = urlencode("Halo {$record->donor_name}, terima kasih atas donasi sebesar Rp {$amount} untuk {$campaign}. Semoga membawa keberkahan dan bernilai ibadah jariyah. (Invoice: {$record->invoice_number})");

                    return "https://wa.me/{$phone}?text={$msg}";
                })
                ->openUrlInNewTab(),

            EditAction::make(),
        ];
    }
}
