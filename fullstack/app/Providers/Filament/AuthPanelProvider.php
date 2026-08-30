<?php

namespace App\Providers\Filament;

use App\Filament\Auth\Pages\Login;
use App\Filament\Auth\Pages\Register;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Auth\RedirectToAdminAfterLogin;
use App\Filament\Auth\Responses\LoginResponse;
use App\Filament\Auth\Responses\RegistrationResponse;
use App\Http\Middleware\RedirectAuthenticatedToAdmin;
use Filament\Auth\Http\Responses\Contracts\LoginResponse as ContractsLoginResponse;
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse as ContractsRegistrationResponse;
use Filament\View\PanelsRenderHook;

class AuthPanelProvider extends PanelProvider
{
    public function register(): void
    {
        parent::register();

        $this->app->bind(ContractsLoginResponse::class, LoginResponse::class);
        $this->app->bind(ContractsRegistrationResponse::class, RegistrationResponse::class);
    }
    // Panel ini sengaja tidak punya resource/page/dashboard.
    // Fungsinya cuma nyediain route login & register yang lepas dari /admin.
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('auth')
            ->path('auth') // hasil: /auth/login & /auth/register
            ->authGuard('web') // WAJIB sama dengan guard di AdminPanelProvider
            ->login(Login::class)
            ->registration(Register::class)
            ->brandLogo(fn () => view('logo-change.logo')) // biar tampilannya konsisten dg admin
            ->favicon(asset('images/favicon.webp'))
            ->darkMode(false)
            ->colors([
                'primary' => Color::Teal,
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => view('filament.auth.styles')->render(),
            )
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                RedirectAuthenticatedToAdmin::class
            ]);
    }
}
