<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProgramCommentController;

// Halaman publik
Route::get('/', function () {
    return view('app');
});

Route::get('/program', function () {
    return view('program');
});

// Komentar program (dinamis, tersimpan di tabel campaign_comments)
Route::get('/program/comments/counts', [ProgramCommentController::class, 'counts'])
    ->name('program.comments.counts');
Route::get('/program/comments', [ProgramCommentController::class, 'index'])
    ->name('program.comments.index');
Route::post('/program/comments', [ProgramCommentController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('program.comments.store');

Route::get('/kabar', function () {
    return view('kabar');
});

// Berita: Kabar Terbaru + Blog & Edukasi
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

Route::get('/karir', function () {
    return view('karir.index');
});

Route::get('/digital-collaborators', function () {
    return view('digital-collaborators.index');
});

// Alur donasi
Route::get('/donasi', [DonasiController::class, 'step1'])->name('donasi.step1');
Route::post('/donasi/step2', [DonasiController::class, 'step2'])->name('donasi.step2');
Route::post('/donasi/step3', [DonasiController::class, 'step3'])->name('donasi.step3');
Route::post('/donasi/konfirmasi', [DonasiController::class, 'konfirmasi'])->name('donasi.konfirmasi');

// Catch-all untuk route yang tidak dikenal -> home
Route::get('/{any}', function () {
    return view('app');
})->where('any', '.*');
