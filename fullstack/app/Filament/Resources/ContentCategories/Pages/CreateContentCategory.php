<?php

namespace App\Filament\Resources\ContentCategories\Pages;

use App\Filament\Resources\ContentCategories\ContentCategoryResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateContentCategory extends CreateRecord
{
    protected static string $resource = ContentCategoryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Kembali')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(static::getResource()::getUrl('index')),
        ];
    }
}
