<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;

class DonationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Detail Donasi')
                    ->icon('heroicon-o-heart')
                    ->schema([
                        Grid::make(3)->schema([
                            TextEntry::make('invoice_number')
                                ->label('No. Invoice')
                                ->fontFamily(FontFamily::Mono)
                                ->copyable()
                                ->copyMessage('Nomor invoice disalin'),

                            TextEntry::make('amount')
                                ->label('Jumlah Donasi')
                                ->money('IDR')
                                ->size(TextSize::Large)
                                ->weight(FontWeight::Bold)
                                ->color('success'),

                            TextEntry::make('status')
                                ->label('Status Pembayaran')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => match ($state) {
                                    'pending' => 'Menunggu Pembayaran',
                                    'verified' => 'Terverifikasi',
                                    'rejected' => 'Ditolak',
                                    default => ucfirst($state),
                                })
                                ->color(fn (string $state): string => match ($state) {
                                    'pending' => 'warning',
                                    'verified' => 'success',
                                    'rejected' => 'danger',
                                    default => 'gray',
                                }),
                        ]),

                        // ganti 'campaign.title' / 'paymentMethod.name' kalau nama relasinya beda
                        Grid::make(2)->schema([
                            TextEntry::make('campaign.title')
                                ->label('Kampanye')
                                ->icon('heroicon-o-megaphone'),

                            TextEntry::make('paymentMethod.name')
                                ->label('Metode Pembayaran')
                                ->icon('heroicon-o-credit-card'),
                        ]),
                    ]),

                Section::make('Data Donatur')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('donor_name')
                                ->label('Nama Donatur')
                                ->icon('heroicon-o-identification'),

                            IconEntry::make('is_anonymous')
                                ->label('Donasi Anonim')
                                ->boolean(),

                            TextEntry::make('donor_email')
                                ->label('Email')
                                ->icon('heroicon-o-envelope')
                                ->copyable(),

                            TextEntry::make('donor_phone')
                                ->label('No. Telepon')
                                ->icon('heroicon-o-phone')
                                ->copyable(),
                        ]),
                    ]),

                Section::make('Bukti Pembayaran')
                    ->icon('heroicon-o-paper-clip')
                    ->schema([
                        TextEntry::make('proof_of_payment')
                            ->label('Berkas Bukti Transfer')
                            ->icon('heroicon-o-document-arrow-down')
                            ->formatStateUsing(fn (string $state): string => basename($state))
                            ->url(function (string $state): string {
                                /** @var FilesystemAdapter $disk */
                                $disk = Storage::disk('public');

                                return $disk->url($state);
                            })
                            ->openUrlInNewTab(),
                    ])
                    // Section, bukan Entry -> cek lewat $record, bukan $state
                    ->visible(fn ($record): bool => filled($record?->proof_of_payment)),

                Section::make('Verifikasi')
                    ->icon('heroicon-o-check-badge')
                    ->schema([
                        // ganti 'verifiedBy.name' kalau nama relasi verifikatornya beda
                        TextEntry::make('verifiedBy.name')
                            ->label('Diverifikasi Oleh')
                            ->placeholder('Belum diverifikasi')
                            ->icon('heroicon-o-user-circle'),
                    ]),

                Section::make('Riwayat Waktu')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('created_at')
                                ->label('Donasi Masuk')
                                ->since()
                                ->dateTimeTooltip(),

                            TextEntry::make('updated_at')
                                ->label('Terakhir Diperbarui')
                                ->since()
                                ->dateTimeTooltip(),
                        ]),
                    ]),
            ]);
    }
}
