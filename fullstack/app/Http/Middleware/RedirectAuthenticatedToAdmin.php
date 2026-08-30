<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectAuthenticatedToAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            return redirect('/berbagi');
        }

        return $next($request);
    }
}
