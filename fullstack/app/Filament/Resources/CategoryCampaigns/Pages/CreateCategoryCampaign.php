<?php

namespace App\Filament\Resources\CategoryCampaigns\Pages;

use App\Filament\Resources\CategoryCampaigns\CategoryCampaignResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoryCampaign extends CreateRecord
{
    protected static string $resource = CategoryCampaignResource::class;

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
