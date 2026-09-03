<?php

namespace App\Filament\Auth\Pages;

use App\Mail\ResetPasswordNotification;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Exception;
use Filament\Actions\Action;
use Filament\Auth\Pages\PasswordReset\RequestPasswordReset as BaseRequestPasswordReset;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Password;

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
            ->color('success')
            ->submit('request');
    }

    public function request(): void
    {
        try {
            $this->rateLimit(2);
        } catch (TooManyRequestsException $exception) {
            $this->getRateLimitedNotification($exception)?->send();

            return;
        }

        $data = $this->form->getState();

        $status = Password::broker(Filament::getAuthPasswordBroker())->sendResetLink(
            $data,
            function (CanResetPassword $user, string $token): void {
                if (! method_exists($user, 'notify')) {
                    throw new Exception('Model ['.$user::class.'] tidak punya method notify().');
                }

                $url = Filament::getResetPasswordUrl($token, $user);
                $user->notify(new ResetPasswordNotification($url));
            },
        );

        if ($status !== Password::RESET_LINK_SENT) {
            Notification::make()->title(__($status))->danger()->send();

            return;
        }

        Notification::make()->title(__($status))->success()->send();
        $this->form->fill();
    }
}
