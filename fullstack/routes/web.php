<?php

use App\Http\Controllers\DonasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/auth/login');
});


// Route::get('/', function () {
//     return view('app');
// });

// Route::get('/program', function () {
//     return view('program');
// });

// Route::get('/kabar', function () {
//     return view('kabar');
// });

// // Donation Routes
// Route::get('/donasi', [DonasiController::class, 'step1'])->name('donasi.step1');
// Route::post('/donasi/step2', [DonasiController::class, 'step2'])->name('donasi.step2');
// Route::post('/donasi/step3', [DonasiController::class, 'step3'])->name('donasi.step3');
// Route::post('/donasi/konfirmasi', [DonasiController::class, 'konfirmasi'])->name('donasi.konfirmasi');

// // Karir & Digital Collaborators
// Route::get('/karir', function () { return view('karir.index'); });
// Route::get('/digital-collaborators', function () { return view('digital-collaborators.index'); });

// // Catch-all for SPA routes
// Route::get('/{any}', function () {
//     return view('app');
// })->where('any', '.*');
