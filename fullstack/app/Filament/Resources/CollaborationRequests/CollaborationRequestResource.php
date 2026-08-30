<?php

namespace App\Filament\Resources\CollaborationRequests;

use App\Filament\Resources\CollaborationRequests\Pages\EditCollaborationRequest;
use App\Filament\Resources\CollaborationRequests\Pages\ListCollaborationRequests;
use App\Filament\Resources\CollaborationRequests\Pages\ViewCollaborationRequest;
use App\Filament\Resources\CollaborationRequests\Schemas\CollaborationRequestForm;
use App\Filament\Resources\CollaborationRequests\Tables\CollaborationRequestsTable;
use App\Models\CollaborationRequest;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CollaborationRequestResource extends Resource
{
    use HasPageShield;

    protected static ?string $model = CollaborationRequest::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static string|\UnitEnum|null $navigationGroup = 'Layanan Publik';

    protected static ?string $navigationLabel = 'Kerjasama / Kolaborasi';

    protected static ?string $modelLabel = 'Permohonan Kolaborasi';

    protected static ?string $pluralModelLabel = 'Permohonan Kolaborasi';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'institution_name';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return CollaborationRequestForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CollaborationRequestsTable::configure($table);
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
            'index' => ListCollaborationRequests::route('/'),
            'view' => ViewCollaborationRequest::route('/{record}'),
            'edit' => EditCollaborationRequest::route('/{record}/edit'),
        ];
    }
}
