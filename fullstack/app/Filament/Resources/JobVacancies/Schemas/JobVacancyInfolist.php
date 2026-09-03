<?php

namespace App\Filament\Resources\JobVacancies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class JobVacancyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Lowongan')
                    ->icon('heroicon-o-briefcase')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Posisi')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull(),

                        TextEntry::make('slug')
                            ->fontFamily(FontFamily::Mono)
                            ->color('gray')
                            ->columnSpanFull(),

                        Grid::make(3)->schema([
                            TextEntry::make('location')
                                ->label('Lokasi')
                                ->icon('heroicon-o-map-pin'),

                            TextEntry::make('employment_type')
                                ->label('Tipe Pekerjaan')
                                ->badge()
                                ->color('gray'),

                            // ganti opsi status ini sesuai enum asli di model
                            TextEntry::make('status')
                                ->label('Status Lowongan')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => match ($state) {
                                    'open' => 'Dibuka',
                                    'closed' => 'Ditutup',
                                    'draft' => 'Draf',
                                    default => ucfirst($state),
                                })
                                ->color(fn (string $state): string => match ($state) {
                                    'open' => 'success',
                                    'closed' => 'danger',
                                    'draft' => 'gray',
                                    default => 'gray',
                                }),
                        ]),
                    ]),

                Section::make('Batas Waktu')
                    ->icon('heroicon-o-calendar')
                    ->schema([
                        TextEntry::make('deadline')
                            ->label('Deadline Pendaftaran')
                            ->date('d M Y')
                            ->icon('heroicon-o-clock')
                            // asumsi 'deadline' di-cast ke Carbon date di model, sesuaikan kalau bukan
                            ->color(fn ($record): string => $record->deadline?->isPast() ? 'danger' : 'success'),
                    ]),

                Section::make('Riwayat Waktu')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('created_at')
                                ->label('Dibuat Pada')
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
