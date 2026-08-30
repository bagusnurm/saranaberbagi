<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class DonationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('invoice_number'),
                TextEntry::make('campaign_id')
                    ->numeric(),
                TextEntry::make('payment_method_id')
                    ->numeric(),
                TextEntry::make('donor_name'),
                TextEntry::make('donor_email'),
                TextEntry::make('donor_phone'),
                IconEntry::make('is_anonymous')
                    ->boolean(),
                TextEntry::make('amount')
                    ->numeric(),
                TextEntry::make('proof_of_payment'),
                TextEntry::make('status'),
                TextEntry::make('verified_by')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
