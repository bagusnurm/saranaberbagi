<?php

namespace App\Filament\Resources\JobApplications\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class JobApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pelamar')
                    ->icon('heroicon-o-user')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama Pelamar')
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold)
                            ->icon('heroicon-o-identification')
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

                Section::make('Detail Lamaran')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('position')
                                ->label('Posisi yang Dilamar')
                                ->icon('heroicon-o-briefcase'),

                            // ganti opsi status ini sesuai enum asli di model
                            TextEntry::make('status')
                                ->label('Status Lamaran')
                                ->badge()
                                ->formatStateUsing(fn (string $state): string => match ($state) {
                                    'applied' => 'Baru Masuk',
                                    'reviewed' => 'Ditinjau',
                                    'interview' => 'Wawancara',
                                    'accepted' => 'Diterima',
                                    'rejected' => 'Ditolak',
                                    default => ucfirst($state),
                                })
                                ->color(fn (string $state): string => match ($state) {
                                    'applied' => 'gray',
                                    'reviewed' => 'info',
                                    'interview' => 'warning',
                                    'accepted' => 'success',
                                    'rejected' => 'danger',
                                    default => 'gray',
                                }),
                        ]),

                        TextEntry::make('cover_letter')
                            ->label('Surat Lamaran')
                            ->prose()
                            ->columnSpanFull()
                            ->placeholder('Tidak menyertakan surat lamaran'),

                        // resume_url diasumsikan sudah full URL, bukan path storage
                        TextEntry::make('resume_url')
                            ->label('Resume / CV')
                            ->icon('heroicon-o-document-arrow-down')
                            ->formatStateUsing(fn (): string => 'Buka Resume')
                            ->url(fn (string $state): string => $state)
                            ->openUrlInNewTab()
                            ->placeholder('Tidak ada resume terlampir'),
                    ]),

                Section::make('Riwayat Waktu')
                    ->icon('heroicon-o-clock')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Grid::make(2)->schema([
                            TextEntry::make('applied_at')
                                ->label('Tanggal Melamar')
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
