<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware ini memastikan hanya request dari server frontend (yang tahu
 * API key rahasia) yang boleh mengakses endpoint di routes/api.php.
 *
 * Ini BUKAN autentikasi user biasa (bukan login/Sanctum) — ini cuma buat
 * memastikan yang manggil API adalah server frontend "SaranaBerbagi",
 * bukan sembarang orang yang nemu URL API-nya.
 */
class VerifyApiKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $providedKey = $request->header('X-API-KEY');
        $validKey = config('services.frontend_api.key');

        // hash_equals dipakai (bukan ===) supaya perbandingan string-nya
        // tidak bisa dieksploitasi lewat timing attack
        if (! $providedKey || ! $validKey || ! hash_equals($validKey, $providedKey)) {
            return response()->json([
                'message' => 'Unauthorized. API key tidak valid atau tidak dikirim.',
            ], 401);
        }

        return $next($request);
    }
}
