<?php

namespace App\Filament\Resources\JobVacancies\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class JobVacancyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Posisi / Judul Lowongan')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('employment_type')
                    ->label('Jenis Pekerjaan')
                    ->options([
                        'fulltime' => 'Full-time (Penuh Waktu)',
                        'parttime' => 'Part-time (Paruh Waktu)',
                        'volunteer' => 'Volunteer (Relawan)',
                    ])
                    ->default('fulltime')
                    ->required(),
                TextInput::make('location')
                    ->label('Lokasi / Penempatan')
                    ->placeholder('Misal: Jakarta / Remote / Lapangan'),
                DatePicker::make('deadline')
                    ->label('Batas Akhir Pendaftaran'),
                Select::make('status')
                    ->label('Status Lowongan')
                    ->options([
                        'open' => 'Buka (Open)',
                        'closed' => 'Tutup (Closed)',
                    ])
                    ->default('open')
                    ->required(),
                RichEditor::make('description')
                    ->label('Deskripsi Pekerjaan / Tanggung Jawab')
                    ->required()
                    ->columnSpanFull(),
                RichEditor::make('requirements')
                    ->label('Kualifikasi / Persyaratan')
                    ->columnSpanFull(),
            ]);
    }
}
