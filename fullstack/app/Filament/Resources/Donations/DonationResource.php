<?php

namespace App\Filament\Resources\Donations;

use App\Filament\Resources\Donations\Pages\EditDonation;
use App\Filament\Resources\Donations\Pages\ListDonations;
use App\Filament\Resources\Donations\Pages\ViewDonation;
use App\Filament\Resources\Donations\Schemas\DonationForm;
use App\Filament\Resources\Donations\Tables\DonationsTable;
use App\Models\Donation;
use BackedEnum;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DonationResource extends Resource
{
    use HasPageShield;

    protected static ?string $model = Donation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static string|\UnitEnum|null $navigationGroup = 'Program & Donasi';

    protected static ?string $navigationLabel = 'Transaksi Donasi';

    protected static ?string $modelLabel = 'Donasi';

    protected static ?string $pluralModelLabel = 'Transaksi Donasi';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'invoice_number';

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return DonationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DonationsTable::configure($table);
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
            'index' => ListDonations::route('/'),
            'view' => ViewDonation::route('/{record}'),
            'edit' => EditDonation::route('/{record}/edit'),
        ];
    }
}
