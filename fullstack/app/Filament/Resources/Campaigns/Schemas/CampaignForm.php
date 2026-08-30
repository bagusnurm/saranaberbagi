<?php

namespace App\Filament\Resources\Campaigns\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('campaign_category_id')
                    ->label('Kategori Program')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('title')
                    ->label('Judul Program')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->unique(ignoreRecord: true),
                FileUpload::make('thumbnail')
                    ->label('Foto / Banner Program')
                    ->image()
                    ->disk('public')
                    ->directory('campaigns/thumbnails')
                    ->imageEditor(),
                TextInput::make('target_amount')
                    ->label('Target Dana Terkumpul')
                    ->required()
                    ->numeric() 
                    ->prefix('Rp')
                    ->default(0),
                TextInput::make('collected_amount')
                    ->label('Dana Terkumpul Saat Ini')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->default(0),
                DatePicker::make('start_date')
                    ->label('Tanggal Mulai')
                    ->native(false),
                DatePicker::make('end_date')
                    ->label('Tanggal Berakhir')
                    ->native(false),
                Select::make('status')
                    ->label('Status Program')
                    ->options([
                        'draft' => 'Draft (Draf)',
                        'active' => 'Aktif (Sedang Berjalan)',
                        'closed' => 'Closed (Ditutup)',
                    ])
                    ->default('active')
                    ->required(),
                Toggle::make('is_featured')
                    ->label('Tampilkan di Pilihan Utama (Featured)')
                    ->default(false),
                RichEditor::make('description')
                    ->label('Deskripsi Lengkap & Cerita Program')
                    ->columnSpanFull(),
            ]);
    }
}
