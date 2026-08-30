<?php

namespace App\Filament\Resources\CategoryCampaigns;

use App\Filament\Resources\CategoryCampaigns\Pages\CreateCategoryCampaign;
use App\Filament\Resources\CategoryCampaigns\Pages\EditCategoryCampaign;
use App\Filament\Resources\CategoryCampaigns\Pages\ListCategoryCampaigns;
use App\Filament\Resources\CategoryCampaigns\Schemas\CategoryCampaignForm;
use App\Filament\Resources\CategoryCampaigns\Tables\CategoryCampaignsTable;
use App\Models\CategoryCampaign;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CategoryCampaignResource extends Resource
{
    use HasPageShield;

    protected static ?string $model = CategoryCampaign::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedFolder;

    protected static string|\UnitEnum|null $navigationGroup = 'Program & Donasi';

    protected static ?string $navigationLabel = 'Kategori Program';

    protected static ?string $modelLabel = 'Kategori Program';

    protected static ?string $pluralModelLabel = 'Kategori Program';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return CategoryCampaignForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CategoryCampaignsTable::configure($table);
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
            'index' => ListCategoryCampaigns::route('/'),
            'create' => CreateCategoryCampaign::route('/create'),
            'edit' => EditCategoryCampaign::route('/{record}/edit'),
        ];
    }
}
