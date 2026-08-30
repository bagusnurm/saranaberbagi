<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('type'),
                TextEntry::make('category_id')
                    ->numeric(),
                TextEntry::make('author_id')
                    ->numeric(),
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('thumbnail'),
                TextEntry::make('published_at')
                    ->dateTime(),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
