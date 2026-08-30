<?php

namespace App\Filament\Resources\Donations\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class DonationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('invoice_number')
                    ->label('Nomor Invoice')
                    ->required()
                    ->default(fn () => 'INV-' . date('YmdHis') . '-' . rand(100, 999))
                    ->unique(ignoreRecord: true),
                Select::make('campaign_id')
                    ->label('Program Donasi')
                    ->relationship('campaign', 'title')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                Select::make('payment_method_id')
                    ->label('Metode Pembayaran')
                    ->relationship('paymentMethod', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('user_id')
                    ->label('Akun Pengguna Terdaftar (Opsional)')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                TextInput::make('donor_name')
                    ->label('Nama Donatur')
                    ->required(),
                TextInput::make('donor_email')
                    ->label('Email Donatur')
                    ->email(),
                TextInput::make('donor_phone')
                    ->label('No. Telepon / WhatsApp')
                    ->tel(),
                Toggle::make('is_anonymous')
                    ->label('Donasi sebagai Hamba Allah (Anonim)')
                    ->default(false),
                TextInput::make('amount')
                    ->label('Nominal Donasi (Rp)')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                Select::make('status')
                    ->label('Status Donasi')
                    ->options([
                        'pending' => 'Pending (Menunggu Pembayaran)',
                        'verified' => 'Verified (Terverifikasi / Berhasil)',
                        'failed' => 'Failed (Gagal)',
                        'expired' => 'Expired (Kedaluwarsa)',
                    ])
                    ->default('pending')
                    ->required(),
                Select::make('verified_by')
                    ->label('Diverifikasi Oleh')
                    ->relationship('verifier', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
                FileUpload::make('proof_of_payment')
                    ->label('Bukti Pembayaran / Transfer')
                    ->image()
                    ->disk('public')
                    ->directory('donations/proofs')
                    ->openable(),
                Textarea::make('message')
                    ->label('Pesan / Doa Donatur')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }
}
