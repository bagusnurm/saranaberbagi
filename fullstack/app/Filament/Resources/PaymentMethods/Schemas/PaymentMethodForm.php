<?php

namespace App\Filament\Resources\PaymentMethods\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PaymentMethodForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama Bank / E-Wallet / Metode')
                    ->required()
                    ->placeholder('Misal: Bank BCA, Mandiri, QRIS'),
                Select::make('type')
                    ->label('Tipe Pembayaran')
                    ->options([
                        'bank_transfer' => 'Transfer Bank Manual',
                        'qris' => 'QRIS (E-Wallet / Instant)',
                    ])
                    ->required()
                    ->default('bank_transfer'),
                TextInput::make('account_number')
                    ->label('Nomor Rekening / No. Akun')
                    ->placeholder('1234567890'),
                TextInput::make('account_name')
                    ->label('Atas Nama (A/N)')
                    ->placeholder('Yayasan Sarana Berbagi'),
                FileUpload::make('logo')
                    ->label('Logo Bank / Gambar QRIS')
                    ->image()
                    ->disk('public')
                    ->directory('payment-methods')
                    ->openable(),
                Toggle::make('is_active')
                    ->label('Status Aktif')
                    ->default(true),
            ]);
    }
}
