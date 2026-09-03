<?php

namespace App\Filament\Resources\Donations\Tables;

use App\Models\Campaign;
use App\Models\Donation;
use App\Support\PhoneNumber;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;

class DonationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn ($query) => $query->with(['campaign', 'paymentMethod']))
            ->columns([
                TextColumn::make('invoice_number')
                    ->label('No. Invoice')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->copyable(),
                TextColumn::make('donor_name')
                    ->label('Donatur')
                    ->searchable()
                    ->description(fn ($record): ?string => $record->is_anonymous ? 'Fulan' : null),
                TextColumn::make('campaign.title')
                    ->label('Program Donasi')
                    ->searchable()
                    ->limit(25)
                    ->default('Donasi Umum'),
                TextColumn::make('amount')
                    ->label('Nominal')
                    ->money('IDR', locale: 'id')
                    ->sortable()
                    ->weight('bold'),
                TextColumn::make('paymentMethod.name')
                    ->label('Metode')
                    ->badge()
                    ->color('gray'),
                ImageColumn::make('proof_of_payment')
                    ->label('Bukti')
                    ->disk('public'),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'verified' => 'success',
                        'failed' => 'danger',
                        'expired' => 'gray',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'verified' => 'Terverifikasi',
                        'failed' => 'Gagal',
                        'expired' => 'Kedaluwarsa',
                        default => $state,
                    }),
                TextColumn::make('created_at')
                    ->label('Waktu Transaksi')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'verified' => 'Terverifikasi',
                        'failed' => 'Gagal',
                        'expired' => 'Kedaluwarsa',
                    ]),
                SelectFilter::make('campaign_id')
                    ->label('Program')
                    ->relationship('campaign', 'title'),
                SelectFilter::make('payment_method_id')
                    ->label('Metode Pembayaran')
                    ->relationship('paymentMethod', 'name'),
            ])
            ->recordActions([
                ActionGroup::make([
                    Action::make('verify')
                        ->label('Verifikasi Pembayaran')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->authorize(fn (Donation $record): bool => auth()->user()?->can('update', $record) ?? false)
                        ->visible(fn (Donation $record): bool => $record->status === 'pending')
                        ->requiresConfirmation()
                        ->modalHeading('Verifikasi Pembayaran Donasi')
                        ->modalDescription('Pastikan dana sudah diterima di rekening yayasan. Aksi ini akan mengubah status menjadi Terverifikasi dan memperbarui dana terkumpul pada campaign.')
                        ->action(function (Donation $record): void {
                            $verified = DB::transaction(function () use ($record): bool {
                                // Lock record donasi untuk mencegah race condition & double verification
                                $donation = Donation::lockForUpdate()->find($record->id);

                                if (! $donation || $donation->status !== 'pending') {
                                    return false;
                                }

                                $donation->update([
                                    'status' => 'verified',
                                    'verified_by' => filament()->auth()->id(),
                                ]);

                                if ($donation->campaign_id) {
                                    $campaign = Campaign::lockForUpdate()->find($donation->campaign_id);
                                    $campaign?->increment('collected_amount', $donation->amount);
                                }

                                return true;
                            });

                            if ($verified) {
                                Notification::make()
                                    ->title('Donasi Terverifikasi')
                                    ->body("Donasi {$record->invoice_number} berhasil diverifikasi.")
                                    ->success()
                                    ->send();
                            } else {
                                Notification::make()
                                    ->title('Verifikasi Gagal')
                                    ->body("Donasi {$record->invoice_number} sudah diverifikasi sebelumnya atau tidak dalam status pending.")
                                    ->warning()
                                    ->send();
                            }
                        }),

                    Action::make('mark_failed')
                        ->label('Tandai Gagal / Dibatalkan')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->authorize(fn (Donation $record): bool => auth()->user()?->can('update', $record) ?? false)
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
                            $phone = PhoneNumber::toWhatsappFormat($record->donor_phone);
                            $amount = number_format($record->amount, 0, ',', '.');
                            $campaign = $record->campaign?->title ?? 'Donasi Kebaikan';
                            $msg = urlencode("Halo {$record->donor_name}, terima kasih atas donasi sebesar Rp {$amount} untuk {$campaign}. Semoga membawa keberkahan dan bernilai ibadah jariyah. (Invoice: {$record->invoice_number})");

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
