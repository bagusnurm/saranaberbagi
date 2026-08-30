<?php

namespace App\Http\Middleware;

use Filament\Http\Middleware\Authenticate as Middleware;

class RedirectToAuthPanelLogin extends Middleware
{
    protected function redirectTo($request): ?string // tanpa type-hint, samain sama induknya
    {
        return $request->expectsJson() ? null : route('filament.auth.auth.login');
    }
}
