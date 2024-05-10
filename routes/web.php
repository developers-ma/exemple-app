<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CategorieController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', [FilmController::class, 'index'])->name('films.index');
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
    Route::get('/fetch-and-store-films', [FilmController::class, 'fetchAndStore'])->name('films.fetchAndStore');
});