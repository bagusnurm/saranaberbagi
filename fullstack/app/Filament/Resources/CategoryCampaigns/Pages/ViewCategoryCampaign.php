<?php

namespace App\Filament\Resources\CategoryCampaigns\Pages;

use App\Filament\Resources\CategoryCampaigns\CategoryCampaignResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewCategoryCampaign extends ViewRecord
{
    protected static string $resource = CategoryCampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('back')
                ->label('Kembali')
                ->icon('heroicon-o-arrow-left')
                ->color('gray')
                ->url(static::getResource()::getUrl('index')),
        ];
    }
}
