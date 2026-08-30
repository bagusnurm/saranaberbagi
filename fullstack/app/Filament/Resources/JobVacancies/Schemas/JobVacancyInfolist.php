<?php

namespace App\Filament\Resources\JobVacancies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class JobVacancyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('title'),
                TextEntry::make('slug'),
                TextEntry::make('location'),
                TextEntry::make('employment_type'),
                TextEntry::make('deadline')
                    ->date(),
                TextEntry::make('status'),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
