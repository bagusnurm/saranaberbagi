<?php

namespace App\Filament\Resources\Campaigns\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class CampaignInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kampanye')
                    ->icon('heroicon-o-megaphone')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Judul Kampanye')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull(),

                        TextEntry::make('description')
                            ->label('Deskripsi')
                            ->prose()
                            ->columnSpanFull(),

                        Grid::make(3)->schema([
                            // ganti opsi status ini sesuai enum asli di model
                            TextEntry::make('status')
                                ->label('Status')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => match ($state) {
                                    'draft' => 'Draf',
                                    'active' => 'Berjalan',
                                    'completed' => 'Selesai',
                                    'cancelled' => 'Dibatalkan',
                                    default => ucfirst($state),
                                })
                                ->color(fn (string $state): string => match ($state) {
                                    'draft' => 'gray',
                                    'active' => 'info',
                                    'completed' => 'success',
                                    'cancelled' => 'danger',
                                    default => 'gray',
                                }),

                            TextEntry::make('start_date')
                                ->label('Mulai')
                                ->date('d M Y')
                                ->icon('heroicon-o-calendar'),

                            TextEntry::make('end_date')
                                ->label('Berakhir')
                                ->date('d M Y')
                                ->icon('heroicon-o-calendar-days'),
                        ]),
                    ]),

                Section::make('Progres Donasi')
                    ->icon('heroicon-o-banknotes')
                    ->schema([
                        Grid::make(3)->schema([
                            TextEntry::make('collected_amount')
                                ->label('Dana Terkumpul')
                                ->money('IDR')
                                ->weight(FontWeight::Bold)
                                ->color('success'),

                            TextEntry::make('target_amount')
                                ->label('Target Dana')
                                ->money('IDR'),

                            // entri virtual (bukan kolom di DB), dihitung dari 2 field di atas
                            TextEntry::make('progress')
                                ->label('Persentase Tercapai')
                                ->formatStateUsing(fn ($record): string => (blank($record->target_amount) || (int) $record->target_amount <= 0)
                                    ? '0%'
                                    : round(($record->collected_amount / $record->target_amount) * 100).'%')
                                ->badge()
                                ->color(fn ($record): string => ($record->target_amount > 0
                                    && ($record->collected_amount / $record->target_amount) >= 1)
                                        ? 'success'
                                        : 'warning'),
                        ]),
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
