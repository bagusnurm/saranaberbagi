<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontFamily;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Konten')
                    ->icon('heroicon-o-newspaper')
                    ->schema([
                        ImageEntry::make('thumbnail')
                            ->label('Thumbnail')
                            ->height(160)
                            ->columnSpanFull(),

                        TextEntry::make('title')
                            ->label('Judul')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull(),

                        TextEntry::make('slug')
                            ->fontFamily(FontFamily::Mono)
                            ->color('gray')
                            ->columnSpanFull(),
                    ]),

                Section::make('Klasifikasi')
                    ->icon('heroicon-o-tag')
                    ->schema([
                        // ganti 'category.name' / 'author.name' kalau nama relasinya beda
                        Grid::make(3)->schema([
                            TextEntry::make('type')
                                ->label('Tipe Konten')
                                ->badge()
                                ->color('gray'),

                            TextEntry::make('category.name')
                                ->label('Kategori')
                                ->icon('heroicon-o-folder'),

                            TextEntry::make('author.name')
                                ->label('Penulis')
                                ->icon('heroicon-o-pencil'),
                        ]),
                    ]),

                Section::make('Publikasi')
                    ->icon('heroicon-o-globe-alt')
                    ->schema([
                        Grid::make(2)->schema([
                            // ganti opsi status ini sesuai enum asli di model
                            TextEntry::make('status')
                                ->label('Status')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => match ($state) {
                                    'draft' => 'Draf',
                                    'published' => 'Terbit',
                                    'archived' => 'Diarsipkan',
                                    default => ucfirst($state),
                                })
                                ->color(fn (string $state): string => match ($state) {
                                    'draft' => 'gray',
                                    'published' => 'success',
                                    'archived' => 'warning',
                                    default => 'gray',
                                }),

                            TextEntry::make('published_at')
                                ->label('Tanggal Terbit')
                                ->dateTime('d M Y, H:i')
                                ->placeholder('Belum diterbitkan'),
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