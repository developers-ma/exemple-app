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

    Route::get('/film/{id}', [FilmController::class, 'details'])->name('film.details');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('films.edit');
    Route::put('/film/{id}', [FilmController::class, 'update'])->name('films.update');
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->name('films.destroy');
});