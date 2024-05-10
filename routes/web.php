<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/films', [FilmController::class, 'index'])->name('films.index');
    Route::get('/fetch-and-store-films', [FilmController::class, 'fetchAndStore'])->name('films.fetchAndStore');
});