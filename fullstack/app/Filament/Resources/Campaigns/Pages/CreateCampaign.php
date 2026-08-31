<?php

namespace App\Filament\Resources\Campaigns\Pages;

use App\Filament\Resources\Campaigns\CampaignResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateCampaign extends CreateRecord
{
    protected static string $resource = CampaignResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('back')
                ->label('Kembali')
                ->icon('heroicon-o-arrow-left')
                ->url(static::getResource()::getUrl('index')),
        ];
    }

     protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getFormActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->label('Buat Campaign')
                ->icon('heroicon-o-check')
                ->size('lg')
                ->extraAttributes([
                    'class' => 'font-semibold',
                ]),

            $this->getCreateAnotherFormAction()
                ->label('Buat & Tambah Lagi')
                ->icon('heroicon-o-plus-circle')
                ->color('gray'),

            $this->getCancelFormAction()
                ->label('Batal')
                ->icon('heroicon-o-x-mark')
                ->color('gray'),
        ];
    }
}
