<?php

namespace App\Filament\Auth\Pages;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    // Pakai layout split-screen custom yang sama dengan Register.
    protected static string $layout = 'filament.layouts.split-auth';

    public function authenticate(): ?LoginResponse
    {
        $this->throttleIfTooManyAttempts();

        $credentials = $this->getCredentialsFromFormState();

        if (! Filament::auth()->attempt($credentials, $this->rememberFormState())) {
            $this->failAuthentication();
        }

        session()->regenerate();

        $this->notifyLoginSuccess();

        return app(LoginResponse::class);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email')
            ->placeholder('nama@email.com')
            ->email()
            ->required()
            ->prefixIcon('heroicon-o-envelope')
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getPasswordFormComponent(): Component
    {
        return TextInput::make('password')
            ->label('Kata Sandi')
            ->placeholder('Masukkan kata sandi Anda')
            ->password()
            ->revealable()
            ->prefixIcon('heroicon-o-lock-closed')
            ->required()
            ->hint(fn () => filament()->hasPasswordReset()
                ? new HtmlString(Blade::render(
                    '<x-filament::link :href="filament()->getRequestPasswordResetUrl()" tabindex="3">Lupa kata sandi?</x-filament::link>'
                ))
                : null)
            ->extraInputAttributes(['tabindex' => 2]);
    }

    protected function getRememberFormComponent(): Component
    {
        return Checkbox::make('remember')
            ->label('Ingat saya');
    }

    protected function getCredentialsFromFormState(): array
    {
        $data = $this->form->getState();

        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }

    protected function rememberFormState(): bool
    {
        return (bool) ($this->form->getState()['remember'] ?? false);
    }

    protected function throttleIfTooManyAttempts(): void
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'data.email' => __('Terlalu banyak percobaan login. Silakan coba lagi dalam beberapa menit', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]),
            ]);
        }
    }

    protected function failAuthentication(): never
    {
        throw ValidationException::withMessages([
            'data.email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ]);
    }

    protected function notifyLoginSuccess(): void
    {
        Notification::make()
            ->title('Login Berhasil')
            ->body('Selamat datang kembali, ' . Filament::auth()->user()->name . '!')
            ->success()
            ->duration(4000)
            ->send();
    }
}