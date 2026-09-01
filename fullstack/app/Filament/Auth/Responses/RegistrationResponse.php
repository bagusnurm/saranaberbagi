<?php

namespace App\Filament\Auth\Responses;

use Filament\Auth\Http\Responses\Contracts\RegistrationResponse as RegistrationResponseContract;
use Illuminate\Http\RedirectResponse;
use Livewire\Features\SupportRedirects\Redirector;

class RegistrationResponse implements RegistrationResponseContract
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
