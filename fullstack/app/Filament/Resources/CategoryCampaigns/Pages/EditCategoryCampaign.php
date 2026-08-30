<?php

namespace App\Filament\Resources\CategoryCampaigns\Pages;

use App\Filament\Resources\CategoryCampaigns\CategoryCampaignResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditCategoryCampaign extends EditRecord
{
    protected static string $resource = CategoryCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
