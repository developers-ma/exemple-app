<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Livewire\Search;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/', [FilmController::class, 'index'])->name('films.index');
    Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/fetch-and-store-films', [FilmController::class, 'fetchAndStore'])->name('films.fetchAndStore');


    Route::get('/film/{id}', [FilmController::class, 'details'])->name('film.details');
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('film.edit');
    Route::put('/film/{id}', [FilmController::class, 'update'])->name('film.update');
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->name('film.destroy');
});