<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectAuthenticatedToAdmin
{
    /**
     * Jika user sudah login dan mengakses halaman auth (login/register),
     * redirect mereka:
     * - Ke /berbagi jika punya akses panel (super_admin, admin, volunteer)
     * - Ke / (landing page) jika user biasa
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();

            if ($user && $user->canAccessAdminPanel()) {
                return redirect('/berbagi');
            }

            // User biasa yang sudah login → kembali ke landing page
            return redirect('/');
        }

        return $next($request);
    }
}
