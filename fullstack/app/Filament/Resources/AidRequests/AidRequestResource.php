<?php

namespace App\Filament\Resources\AidRequests;

use App\Filament\Resources\AidRequests\Pages\EditAidRequest;
use App\Filament\Resources\AidRequests\Pages\ListAidRequests;
use App\Filament\Resources\AidRequests\Pages\ViewAidRequest;
use App\Filament\Resources\AidRequests\Schemas\AidRequestInfolist;
use App\Filament\Resources\AidRequests\Tables\AidRequestsTable;
use App\Models\AidRequest;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class AidRequestResource extends Resource
{
    use HasPageShield;

    protected static ?string $model = AidRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedHandRaised;

    protected static string|UnitEnum|null $navigationGroup = 'Layanan Publik';

    protected static ?string $navigationLabel = 'Permohonan Bantuan';

    protected static ?string $modelLabel = 'Permohonan Bantuan';

    protected static ?string $pluralModelLabel = 'Permohonan Bantuan';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'applicant_name';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function infolist(Schema $schema): Schema
    {
        return AidRequestInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AidRequestsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAidRequests::route('/'),
            'view' => ViewAidRequest::route('/{record}'),
            'edit' => EditAidRequest::route('/{record}/edit'),
        ];
    }
}
