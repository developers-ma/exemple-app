<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Validator; // Importer Validator
use App\Http\Requests\FilmRequest;
use App\Http\Requests\GenreRequest;
use App\Http\Requests\FilmUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FilmController extends Controller
{
    /**
     * Affiche tous les films.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $films = Film::all(10);
        return view('films', compact('films'));
    }

    /**
     * Affiche les détails d'un film.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function details(Request $request, int $id): \Illuminate\View\View
    {
        // Essaie de trouver le détail du film avec l'ID spécifié
        try {
            $filmDetail = Film::findOrFail($id); // Recherche le film par ID et lève une exception si aucun film n'est trouvé
            return view('details', compact('filmDetail')); // Renvoie la vue des détails du film avec les données du film
        } catch (ModelNotFoundException $e) {
            abort(404); // Renvoie une réponse HTTP 404 si aucun film n'est trouvé avec l'ID spécifié
        }
    }

    /**
     * Récupère les films populaires depuis l'API et les enregistre en base de données.
     *
     * @return \Illuminate\Http\RedirectResponse|bool
     */
    public function fetchAndStore(FilmRequest $filmRequest, GenreRequest $genreRequest, TMDBService $tmdbService): \Illuminate\Http\RedirectResponse|bool
{
    try {
        // Valider les données des films
        $validatedFilmData = $filmRequest->validated();

        // Valider les données des genres
        $validatedGenreData = $genreRequest->validated();

        // Récupérer les films populaires depuis l'API TMDB
        $films = $tmdbService->getTrendingMovies();

        // Enregistrer les films récupérés depuis l'API dans la base de données
        foreach ($films as $film) {
            $newMovie = Film::updateOrCreate(
                ['movie_id' => $film['movie_id']], // Utilisation de la clé 'movie_id' pour vérifier l'existence du film
                [
                    'title' => $film['title'],
                    'description' => $film['description'],
                    'image_url' => $film['image_url'],
                    'genre_ids' => $film['genre_ids']
                ] + $validatedFilmData // Fusion des données validées avec les données de l'API
            );
        }

        // Récupérer les genres de films depuis l'API TMDB
        $genresFromApi = $tmdbService->getMovieGenres();

        // Vérifier si aucun genre n'a été récupéré depuis l'API
        if (empty($genresFromApi)) {
            return false;
        }

        // Enregistrer les genres récupérés depuis l'API dans la base de données
        foreach ($genresFromApi as $genre) {
            $existingGenre = Genre::where('genre_id', $genre['genre_id'])->first();

            // Si le genre n'existe pas déjà, le créer
            if (!$existingGenre) {
                $newGenre = new Genre();
                $newGenre->name = $genre['name']; // Assigner la valeur du nom récupéré de l'API
                $newGenre->genre_id = $genre['genre_id']; // Assigner la valeur du genre_id récupéré de l'API
                $newGenre->fill($validatedGenreData); // Utilisation des données validées pour créer un nouveau genre
                $newGenre->save();
            }
        }

        // Rediriger vers la page d'index des films avec un message de succès
        return redirect()->route('films.index')->with('success', 'Films récupérés depuis l\'API et enregistrés avec succès.');
    } catch (\Exception $e) {
        // Gérer les exceptions
        return redirect()->back()->with('error', 'Une erreur s\'est produite : ' . $e->getMessage());
    }
}

    /**
     * Affiche le formulaire de modification d'un film.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id): \Illuminate\View\View
    {
        $film = Film::findOrFail($id);
        return view('films.edit', compact('film'));
    }

    /**
     * Met à jour les informations d'un film.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(FilmUpdateRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        // Mise à jour des informations du film dans la base de données
        $film = Film::findOrFail($id);
        $film->update($request->validated());
    
        return redirect()->route('films.index')->with('success', 'Film mis à jour avec succès.');
    }

    /**
     * Supprime un film de la base de données.
     *
     * @param  int  $movie_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(int $movie_id): \Illuminate\Http\RedirectResponse
    {
        // Recherche et suppression du film par son ID
        $film = Film::findOrFail($movie_id);
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film supprimé avec succès.');
    }

    /**
     * Affiche les films par genre.
     *
     * @param  int  $genre_id
     * @return \Illuminate\View\View
     */
    public function getByGenre(int $genre_id): \Illuminate\View\View
    {
        // Récupère les films appartenant à un genre spécifique
        $films = Film::byGenre($genre_id)->get();
        return view('films.by_genre', compact('films'));
    }
}