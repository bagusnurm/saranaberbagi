<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
   public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pengguna')
                    ->description('Masukkan informasi dasar pengguna.')
                    ->icon('heroicon-o-user')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Lengkap')
                                    ->placeholder('Masukkan nama lengkap')
                                    ->prefixIcon('heroicon-o-user')
                                    ->required()
                                    ->maxLength(255)
                                    ->autofocus(),

                                TextInput::make('email')
                                    ->label('Alamat Email')
                                    ->placeholder('contoh@email.com')
                                    ->prefixIcon('heroicon-o-envelope')
                                    ->email()
                                    ->required()
                                    ->unique(
                                        ignoreRecord: true
                                    )
                                    ->maxLength(255),

                                \Filament\Forms\Components\Select::make('roles')
                                    ->label('Peran / Hak Akses (Role)')
                                    ->relationship('roles', 'name')
                                    ->multiple()
                                    ->preload()
                                    ->searchable()
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpanFull(),

                Section::make('Keamanan Akun')
                    ->description('Atur password yang digunakan untuk login ke dalam sistem.')
                    ->icon('heroicon-o-lock-closed')
                    ->schema([
                        TextInput::make('password')
                            ->label('Password')
                            ->placeholder('Masukkan password')
                            ->password()
                            ->revealable()
                            ->prefixIcon('heroicon-o-key')
                            ->required(
                                fn (string $operation): bool =>
                                    $operation === 'create'
                            )
                            ->minLength(8)
                            ->maxLength(255)
                            ->dehydrated(
                                fn ($state): bool =>
                                    filled($state)
                            )
                            ->helperText(
                                'Minimal 8 karakter. Kosongkan saat edit jika tidak ingin mengubah password.'
                            ),

                        TextInput::make('password_confirmation')
                            ->label('Konfirmasi Password')
                            ->placeholder('Ulangi password')
                            ->password()
                            ->revealable()
                            ->prefixIcon('heroicon-o-shield-check')
                            ->same('password')
                            ->required(
                                fn (string $operation): bool =>
                                    $operation === 'create'
                            )
                            ->dehydrated(false),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),

                Section::make('Verifikasi Email')
                    ->description('Kelola status verifikasi alamat email pengguna.')
                    ->icon('heroicon-o-check-badge')
                    ->schema([
                        DateTimePicker::make('email_verified_at')
                            ->label('Email Terverifikasi Pada')
                            ->placeholder('Belum diverifikasi')
                            ->prefixIcon('heroicon-o-calendar')
                            ->native(false)
                            ->seconds(false)
                            ->displayFormat('d M Y, H:i')
                            ->helperText(
                                'Kosongkan jika email pengguna belum diverifikasi.'
                            ),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
