<?php

namespace App\Filament\Resources\JobVacancies\Pages;

use App\Filament\Resources\JobVacancies\JobVacancyResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewJobVacancy extends ViewRecord
{
    protected static string $resource = JobVacancyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make()
                ->color('info'),
            Action::make('back')
                ->label('Kembali')
                ->color('gray')
                ->icon('heroicon-o-arrow-left')
                ->url(static::getResource()::getUrl('index')),
        ];
    }
}
