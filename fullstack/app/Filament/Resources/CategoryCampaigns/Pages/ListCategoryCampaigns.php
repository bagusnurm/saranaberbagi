<?php

namespace App\Filament\Resources\CategoryCampaigns\Pages;

use App\Filament\Resources\CategoryCampaigns\CategoryCampaignResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoryCampaigns extends ListRecords
{
    protected static string $resource = CategoryCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
