<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;
use App\Services\TMDBService;
use Illuminate\Support\Facades\Validator;

//livewire
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FilmController extends Controller
{
   
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
                    'genre_ids' => json_encode($film->genre_ids) // Convert array to JSON string
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
     */
    public function destroy(int $movie_id): \Illuminate\Http\RedirectResponse
    {
        // Recherche et suppression du film par son ID
        $film = Film::findOrFail($movie_id);
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film supprimé avec succès.');
    }

    /**
     * Livewire test
     *
     */
    public function testSearchComponent()
    {
        // Créer des genres
        $genre1 = Genre::factory()->create();
        $genre2 = Genre::factory()->create();

        // Créer des films
        $film1 = Film::factory()->create(['title' => 'Film 1', 'genre_ids' => json_encode([$genre1->id])]);
        $film2 = Film::factory()->create(['title' => 'Film 2', 'genre_ids' => json_encode([$genre2->id])]);

        // Monter le composant Livewire en tant qu'utilisateur
        Livewire::actingAs($user)
        ->test(\App\Http\Livewire\Search::class)
        ->assertSee($film1->title)
        ->assertSee($film2->title)
        ->set('searchTitle', 'Film 1') // Définir le titre de recherche pour filtrer les films
        ->assertSee($film1->title) // Vérifier que le film 1 est toujours visible
        ->assertDontSee($film2->title); // Vérifier que le film 2 n'est pas visible

    }

}