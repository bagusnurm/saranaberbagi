<?php

namespace App\Filament\Auth\Pages;

use Filament\Actions\Action;
use Filament\Auth\Pages\PasswordReset\ResetPassword as BaseResetPassword;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Validation\Rules\Password;

class ResetPassword extends BaseResetPassword
{
    // Pakai layout split-screen custom yang sama dengan Login & Register.
    protected static string $layout = 'filament.layouts.split-auth';

    public function getTitle(): string|Htmlable
    {
        return 'Atur Ulang Kata Sandi';
    }

    public function getHeading(): string|Htmlable
    {
        return 'Atur Ulang Kata Sandi';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email')
            ->prefixIcon('heroicon-o-envelope')
            ->disabled()
            ->autofocus();
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Kata Sandi Baru')
            ->placeholder('Masukkan kata sandi baru')
            ->password()
            ->revealable()
            ->prefixIcon('heroicon-o-lock-closed')
            ->required()
            ->rule(Password::default())
            ->same('passwordConfirmation')
            ->validationAttribute('kata sandi')
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->label('Konfirmasi Kata Sandi Baru')
            ->placeholder('Masukkan ulang kata sandi baru')
            ->password()
            ->revealable()
            ->prefixIcon('heroicon-o-shield-check')
            ->required()
            ->dehydrated(false)
            ->extraInputAttributes(['tabindex' => 2]);
    }

    public function getResetPasswordFormAction(): Action
    {
        return Action::make('resetPassword')
            ->label('Atur Ulang Kata Sandi')
            ->submit('resetPassword');
    }
}
