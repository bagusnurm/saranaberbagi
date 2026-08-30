<?php

namespace App\Filament\Resources\CategoryCampaigns\Pages;

use App\Filament\Resources\CategoryCampaigns\CategoryCampaignResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryCampaign extends ViewRecord
{
    protected static string $resource = CategoryCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
