<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Livewire\Search;

// Définition des routes accessibles aux utilisateurs authentifiés
Route::middleware([
    'auth:sanctum', // Authentification via Sanctum
    config('jetstream.auth_session'), // Session d'authentification Jetstream
    'verified', // Vérification de l'adresse e-mail
])->group(function () {

    // Route pour afficher la liste des films
    Route::get('/', function () {
        return view('films'); // Affichage de la vue "films"
    })->name('films.index'); // Nom de la route pour la liste des films
    
    // Route pour afficher la liste des genres
    Route::get('/genres', function () {
        return view('genres'); // Affichage de la vue "genres"
    })->name('genres.index'); // Nom de la route pour la liste des genres

   
    Route::get('/fetch-and-store-films', [FilmController::class, 'fetchAndStore'])->name('films.fetchAndStore'); // Récupérer et enregistrer les films
    Route::get('/film/{id}', [FilmController::class, 'details'])->name('film.details'); // Détails d'un film
    Route::get('/film/{id}/edit', [FilmController::class, 'edit'])->name('film.edit'); // Modifier un film
    Route::put('/film/{id}', [FilmController::class, 'update'])->name('film.update'); // Mettre à jour un film
    Route::delete('/film/{id}', [FilmController::class, 'destroy'])->name('film.destroy'); // Supprimer un film
});