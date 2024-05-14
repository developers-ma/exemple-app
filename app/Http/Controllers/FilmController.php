<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Validator;

class FilmController extends Controller
{
    /**
     * Affiche tous les films.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        $films = Film::all();
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
        $filmDetail = Film::find($id);
        return view('details', compact('filmDetail'));
    }

    /**
     * Récupère les films populaires depuis l'API et les enregistre en base de données.
     *
     * @return \Illuminate\Http\RedirectResponse|bool
     */
    public function fetchAndStore(): \Illuminate\Http\RedirectResponse|bool
    {
        $tmdbService = new TMDBService();
        $films = $tmdbService->getTrendingMovies();

        // Enregistrer les films récupérés depuis l'API dans la base de données
        foreach ($films as $film) {
            $newMovie = Film::updateOrCreate(
                ['movie_id' => $film->movie_id],
                [
                    'title' => $film->title,
                    'description' => $film->description,
                    'image_url' => $film->image_url,
                    'genre_ids' => $film->genre_ids
                ]
            );
        }

        // Récupérer et enregistrer les genres de films depuis l'API dans la base de données
        $tmdbGenres = new TMDBService();
        $genresFromApi = $tmdbGenres->getMovieGenres();

        if (empty($genresFromApi)) {
            return false;
        }

        foreach ($genresFromApi as $genreData) {
            if (isset($genreData['genre_id']) && isset($genreData['name'])) {
                $existingGenre = Genre::where('genre_id', $genreData['genre_id'])->first();

                if (!$existingGenre) {
                    $newGenre = new Genre();
                    $newGenre->genre_id = $genreData['genre_id'];
                    $newGenre->name = $genreData['name'];
                    $newGenre->save();
                }
            }
        }
        return redirect()->route('films.index')->with('success', 'Films récupérés depuis l\'API et enregistrés avec succès.');
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
    public function update(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        // Validation des données du formulaire
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
        ]);

        // Redirection avec les erreurs de validation si nécessaire
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Mise à jour des informations du film dans la base de données
        $film = Film::findOrFail($id);
        $film->update($request->all());

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