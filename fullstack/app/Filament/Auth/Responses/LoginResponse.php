<?php

namespace App\Filament\Auth\Responses;

use Filament\Auth\Http\Responses\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse|Redirector
    {
        $user = auth()->user();
        if ($user && $user->canAccessAdminPanel()) {
            return redirect()->intended(url('/berbagi'));
        }

        return redirect()->intended(url('/'));
    }
}
