<?php

namespace App\Filament\Resources\Campaigns\Pages;

use App\Filament\Resources\Campaigns\CampaignResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCampaigns extends ListRecords
{
    protected static string $resource = CampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Buat Campaign')
                ->icon('heroicon-o-plus-circle')
                ->size('lg')
                ->extraAttributes([
                    'class' => 'font-semibold',
                ]),
        ];
    }
}
