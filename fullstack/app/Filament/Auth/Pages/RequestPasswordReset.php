<?php

namespace App\Filament\Auth\Pages;

use Filament\Actions\Action;
use Filament\Auth\Pages\PasswordReset\RequestPasswordReset as BaseRequestPasswordReset;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;

class RequestPasswordReset extends BaseRequestPasswordReset
{
    // Pakai layout split-screen custom yang sama dengan Login & Register.
    protected static string $layout = 'filament.layouts.split-auth';

    public function getTitle(): string|Htmlable
    {
        return 'Lupa Kata Sandi';
    }

    public function getHeading(): string|Htmlable
    {
        return 'Lupa Kata Sandi?';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent(),
            ]);
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email')
            ->placeholder('Masukkan email terdaftar Anda')
            ->email()
            ->required()
            ->prefixIcon('heroicon-o-envelope')
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getRequestFormAction(): Action
    {
        return Action::make('request')
            ->label('Kirim Link Reset Password')
            ->submit('request');
    }
}
