<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

// Serve SPA entry
Route::get('/', [FrontendController::class, 'index']);

// Catch-all route to allow client-side routing in the SPA.
Route::get('/{any}', [FrontendController::class, 'index'])->where('any', '.*');
