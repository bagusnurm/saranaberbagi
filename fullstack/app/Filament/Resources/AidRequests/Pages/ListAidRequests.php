<?php

namespace App\Filament\Resources\AidRequests\Pages;

use App\Filament\Resources\AidRequests\AidRequestResource;
use Filament\Resources\Pages\ListRecords;

class ListAidRequests extends ListRecords
{
    protected static string $resource = AidRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
