<?php

namespace App\Filament\Auth\Pages;

use App\Models\User;
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Register extends BaseRegister
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ])
            ->statePath('data');
    }

    public function register(): ?RegistrationResponse
    {
        $response = parent::register();

        $this->notifyRegistrationSuccess();

        return $response;
    }

    protected function handleRegistration(array $data): Model
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);
    }

    protected function getNameFormComponent(): Component
    {
        return TextInput::make('name')
            ->label('Nama Pengguna')
            ->placeholder('Masukkan nama pengguna Anda')
            ->required()
            ->maxLength(255)
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email')
            ->placeholder('nama@email.com')
            ->email()
            ->required()
            ->maxLength(255)
            ->unique(User::class)
            ->extraInputAttributes(['tabindex' => 2]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Kata Sandi')
            ->placeholder('Masukkan kata sandi Anda')
            ->password()
            ->revealable()
            ->required()
            ->rule(Password::default())
            ->same('passwordConfirmation')
            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
            ->extraInputAttributes(['tabindex' => 3]);
    }

    protected function getPasswordConfirmationFormComponent(): Component
    {
        return TextInput::make('passwordConfirmation')
            ->label('Konfirmasi Kata Sandi')
            ->placeholder('Masukkan ulang kata sandi Anda')
            ->password()
            ->revealable()
            ->required()
            ->dehydrated(false)
            ->extraInputAttributes(['tabindex' => 4]);
    }

    protected function notifyRegistrationSuccess(): void
    {
        Notification::make()
            ->title('Registrasi Berhasil')
            ->body('Akun Anda berhasil dibuat.')
            ->success()
            ->duration(4000)
            ->send();
    }
}
