<?php

namespace App\Filament\Resources\AidRequests\Schemas;

use App\Models\AidRequest;
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

                            TextEntry::make('aid_type')
                                ->label('Jenis Bantuan')
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

                Section::make('Berkas Pendukung')
                    ->icon('heroicon-o-paper-clip')
                    ->schema([
                        TextEntry::make('supporting_document')
                            ->label('Dokumen Terlampir')
                            ->icon('heroicon-o-document-arrow-down')
                            ->formatStateUsing(fn (string $state): string => basename($state))
                            // ganti 'public' kalau file disimpan di disk lain
                            ->url(function (string $state): string {
                                /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
                                $disk = Storage::disk('public');
                                return $disk->url($state);
                            })
                            ->openUrlInNewTab(),
                    ])
                    ->visible(fn (?AidRequest $record): bool => filled($record?->supporting_document)),

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
