<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Profil')
                    ->icon('heroicon-o-user-circle')
                    ->schema([
                        ImageEntry::make('photo')
                            ->label('Foto Profil')
                            ->circular()
                            ->size(80)
                            ->columnSpanFull(),

                        TextEntry::make('name')
                            ->label('Nama')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull(),

                        Grid::make(2)->schema([
                            TextEntry::make('email')
                                ->label('Email')
                                ->icon('heroicon-o-envelope')
                                ->copyable(),

                            TextEntry::make('phone')
                                ->label('No. Telepon')
                                ->icon('heroicon-o-phone')
                                ->copyable(),
                        ]),
                    ]),

                Section::make('Status Akun')
                    ->icon('heroicon-o-shield-check')
                    ->schema([
                        // ganti opsi status ini sesuai enum asli di model
                        TextEntry::make('status')
                            ->label('Status')
                            ->badge()
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'active' => 'Aktif',
                                'inactive' => 'Nonaktif',
                                'banned' => 'Diblokir',
                                default => ucfirst($state),
                            })
                            ->color(fn (string $state): string => match ($state) {
                                'active' => 'success',
                                'inactive' => 'gray',
                                'banned' => 'danger',
                                default => 'gray',
                            }),
                    ]),

                Section::make('Riwayat Waktu')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('created_at')
                                ->label('Tanggal Dibuat')
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
