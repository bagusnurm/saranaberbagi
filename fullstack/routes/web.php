<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\KabarController;
use App\Http\Controllers\KarirController;
use App\Http\Controllers\KolaborasiController;
use App\Http\Controllers\ProgramCommentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SitemapController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Halaman publik
Route::get('/', function () {
    return view('beranda.index');
});

Route::get('/program', [ProgramController::class, 'index'])->name('program.index');
Route::get('/program/{slug}', [ProgramController::class, 'show'])->name('program.show');

// Komentar program (dinamis, tersimpan di tabel campaign_comments)
Route::get('/program/comments/counts', [ProgramCommentController::class, 'counts'])
    ->name('program.comments.counts');
Route::get('/program/comments', [ProgramCommentController::class, 'index'])
    ->name('program.comments.index');
Route::post('/program/comments', [ProgramCommentController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('program.comments.store');

// Kabar (Blog, Artikel & Inspirasi - type: blog)
Route::get('/kabar', [KabarController::class, 'index'])->name('kabar.index');
Route::get('/kabar/{slug}', [KabarController::class, 'show'])->name('kabar.show');

// Berita (Warta Berita & Kabar Terbaru - type: news)
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Karir & Lowongan
Route::get('/karir', [KarirController::class, 'index'])->name('karir.index');
Route::get('/karir/{slug}', [KarirController::class, 'show'])->name('karir.show');
Route::post('/karir/apply', [KarirController::class, 'apply'])
    ->middleware('throttle:5,1')
    ->name('karir.apply');

// Kolaborasi & Pengajuan Bantuan (Platform Tumbuh Bersama)
Route::get('/kolaborasi', [KolaborasiController::class, 'index'])->name('kolaborasi.index');
Route::post('/kolaborasi/ajukan', [KolaborasiController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('kolaborasi.store');
Route::redirect('/digital-collaborators', '/kolaborasi', 301);

// Alur donasi
Route::get('/donasi', [DonasiController::class, 'step1'])->name('donasi.step1');
Route::post('/donasi/step2', [DonasiController::class, 'step2'])->name('donasi.step2');
Route::post('/donasi/step3', [DonasiController::class, 'step3'])->name('donasi.step3');
Route::post('/donasi/konfirmasi', [DonasiController::class, 'konfirmasi'])
    ->middleware('throttle:5,1')
    ->name('donasi.konfirmasi');

// Auth logout route untuk frontend
Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

// Sitemap XML
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

// Catch-all untuk route yang tidak dikenal -> 404
Route::get('/{any}', function () {
    abort(404);
})->where('any', '.*');
