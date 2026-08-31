<?php

namespace App\Filament\Resources\AidRequests\Schemas;

use App\Models\AidRequest;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Illuminate\Support\Facades\Storage;

class AidRequestInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pemohon')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextEntry::make('applicant_name')
                            ->label('Nama Pemohon')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->icon('heroicon-o-identification')
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            TextEntry::make('phone')
                                ->label('Nomor Telepon')
                                ->icon('heroicon-o-phone')
                                ->copyable()
                                ->copyMessage('Nomor disalin'),

                            TextEntry::make('campaign.title')
                                ->label('Program')
                                ->icon('heroicon-o-gift')
                                ->badge()
                                ->color('gray'),
                        ]),
                    ]),

                Section::make('Status Permohonan')
                    ->icon('heroicon-o-clipboard-document-check')
                    ->schema([
                        // Label, ikon, dan warna badge disatukan per status biar konsisten
                        // sama alur aksi di ViewAidRequest (pending → verified → disbursed / rejected).
                        TextEntry::make('status')
                            ->label('Status Saat Ini')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'pending' => 'Menunggu Verifikasi',
                                'verified' => 'Terverifikasi',
                                'disbursed' => 'Disalurkan',
                                'rejected' => 'Ditolak',
                                default => ucfirst($state),
                            })
                            ->icon(fn (string $state): string => match ($state) {
                                'pending' => 'heroicon-o-clock',
                                'verified' => 'heroicon-o-check-circle',
                                'disbursed' => 'heroicon-o-gift',
                                'rejected' => 'heroicon-o-x-circle',
                                default => 'heroicon-o-question-mark-circle',
                            })
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'verified' => 'info',
                                'disbursed' => 'success',
                                'rejected' => 'danger',
                                default => 'gray',
                            }),

                        TextEntry::make('admin_note')
                            ->label('Catatan Admin')
                            ->icon('heroicon-o-pencil-square')
                            ->columnSpanFull()
                            ->visible(fn (?string $state): bool => filled($state)),
                    ]),

                Section::make('Data Penerima')
                    ->icon('heroicon-o-identification')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('nik')->label('NIK'),
                            TextEntry::make('kk_number')->label('No. KK'),
                            TextEntry::make('birthdate')->label('Tanggal Lahir')->date(),
                            TextEntry::make('gender')->label('Jenis Kelamin')
                                ->formatStateUsing(fn (string $state) => $state === 'male' ? 'Pria' : 'Wanita'),
                            TextEntry::make('occupation')->label('Pekerjaan')->placeholder('-'),
                            TextEntry::make('marital_status')->label('Status Marital')
                                ->formatStateUsing(fn (string $state) => str($state)->replace('_', ' ')->title()),
                            TextEntry::make('is_mualaf')->label('Mualaf')->badge()
                                ->formatStateUsing(fn (bool $state) => $state ? 'Ya' : 'Tidak')
                                ->color(fn (bool $state) => $state ? 'success' : 'gray'),
                        ]),
                        TextEntry::make('full_address')
                            ->label('Alamat')
                            ->state(fn (AidRequest $record): string => "{$record->address}, {$record->village}, {$record->city}, {$record->province}")
                            ->columnSpanFull(),
                    ]),

                Section::make('Foto & Video')
                    ->icon('heroicon-o-paper-clip')
                    ->schema([
                        ImageEntry::make('photos')
                            ->label('Foto')
                            ->disk('public')
                            ->size(80)
                            ->visible(fn (?array $state): bool => filled($state)),

                        // stdlib TextEntry + html(): belum ada VideoEntry bawaan Filament,
                        // jadi cukup list link yang buka file di tab baru.
                        TextEntry::make('videos')
                            ->label('Video')
                            ->html()
                            ->formatStateUsing(fn (?array $state): string => collect($state)
                                ->map(fn (string $path) => '<a href="'.Storage::disk('public')->url($path).'" target="_blank" class="underline">'.basename($path).'</a>')
                                ->implode('<br>'))
                            ->visible(fn (?array $state): bool => filled($state)),
                    ])
                    ->visible(fn (?AidRequest $record): bool => filled($record?->photos) || filled($record?->videos)),

                Section::make('Detail Penyaluran')
                    ->icon('heroicon-o-banknotes')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('fund_needed')->label('Kebutuhan Biaya')->money('IDR'),
                            TextEntry::make('bank_name')->label('Bank'),
                            TextEntry::make('bank_account_number')->label('No. Rekening')->copyable(),
                            TextEntry::make('bank_account_holder')->label('Atas Nama'),
                        ]),
                    ]),

                Section::make('Riwayat Waktu')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('created_at')
                                ->label('Diajukan Pada')
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
