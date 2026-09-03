<?php

namespace App\Filament\Resources\CollaborationRequests\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;

class CollaborationRequestInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pemohon')
                    ->icon('heroicon-o-building-office-2')
                    ->schema([
                        TextEntry::make('institution_name')
                            ->label('Nama Instansi')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->icon('heroicon-o-building-office')
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            TextEntry::make('email')
                                ->label('Alamat Email')
                                ->icon('heroicon-o-envelope')
                                ->copyable(),

                            TextEntry::make('phone')
                                ->label('No. Telepon')
                                ->icon('heroicon-o-phone')
                                ->copyable(),
                        ]),
                    ]),

                Section::make('Detail Kerja Sama')
                    ->icon('heroicon-o-hand-raised')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('collaboration_type')
                                ->label('Jenis Kerja Sama')
                                ->badge()
                                ->color('gray'),

                            // ganti opsi status ini sesuai enum asli di model
                            TextEntry::make('status')
                                ->label('Status Permohonan')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => match ($state) {
                                    'pending' => 'Menunggu Tinjauan',
                                    'approved' => 'Disetujui',
                                    'rejected' => 'Ditolak',
                                    default => ucfirst($state),
                                })
                                ->color(fn (string $state): string => match ($state) {
                                    'pending' => 'warning',
                                    'approved' => 'success',
                                    'rejected' => 'danger',
                                    default => 'gray',
                                }),
                        ]),
                    ]),

                Section::make('Lampiran')
                    ->icon('heroicon-o-paper-clip')
                    ->schema([
                        TextEntry::make('attachment')
                            ->label('Berkas Terlampir')
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
                    ->visible(fn ($record): bool => filled($record?->attachment)),

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
