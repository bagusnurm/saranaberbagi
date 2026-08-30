<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Judul Artikel')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                TextInput::make('slug')
                    ->label('Slug URL')
                    ->required()
                    ->unique(ignoreRecord: true),
                Select::make('type')
                    ->label('Tipe Konten')
                    ->options([
                        'blog' => 'Artikel / Blog',
                        'news' => 'Berita / Press Release',
                    ])
                    ->default('blog')
                    ->required(),
                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                Select::make('author_id')
                    ->label('Penulis / Author')
                    ->relationship('author', 'name')
                    ->default(fn () => filament()->auth()->id())
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('tags')
                    ->label('Tag')
                    ->relationship('tags', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable(),
                FileUpload::make('thumbnail')
                    ->label('Foto Sampul / Banner')
                    ->image()
                    ->disk('public')
                    ->directory('posts/thumbnails')
                    ->imageEditor(),
                Select::make('status')
                    ->label('Status Publikasi')
                    ->options([
                        'draft' => 'Draft (Draf)',
                        'published' => 'Published (Terbit)',
                    ])
                    ->default('published')
                    ->required(),
                DateTimePicker::make('published_at')
                    ->label('Waktu Terbit')
                    ->default(now()),
                RichEditor::make('content')
                    ->label('Isi Konten Artikel')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
