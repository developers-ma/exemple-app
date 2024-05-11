<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Genre;

use App\Services\TMDBService;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::paginate(10);
        return view('films', compact('films'));
    }

    
    public function details(Request $request, $id){
        $filmDetail = Film::find($id); 
        return view('details', compact('filmDetail'));
    }
    
    

    public function fetchAndStore()
    {
        $tmdbService = new TMDBService();
        $films = $tmdbService->getTrendingMovies();
    
        foreach ($films as $film) {
            // Update or create the film
            $newMovie = Film::updateOrCreate(
                ['movie_id' => $film->movie_id], // Assuming $film->movie_id contains TMDb movie ID
                [
                    'title' => $film->title,
                    'description' => $film->description,
                    'image_url' => $film->image_url,
                    'genre_ids' => $film->genre_ids // Assuming you have this property in the Film model
                ]
            );
        }


        //genres

        $tmdb_genres = new TMDBService();
        $genresFromApi = $tmdb_genres->getMovieGenres();
        
        if (empty($genresFromApi)) {
            // Handle case when no genres are fetched from the API
            return false;
        }
        
        foreach ($genresFromApi as $genreData) {
            // Check if the 'id' and 'name' fields exist in the data
            if (isset($genreData['genre_id']) && isset($genreData['name'])) {
                // Check if the genre already exists in the database
                $existingGenre = Genre::where('genre_id', $genreData['genre_id'])->first();
        
                if (!$existingGenre) {
                    // Genre doesn't exist, create a new one
                    $newGenre = new Genre();
                    $newGenre->genre_id = $genreData['genre_id']; // Assuming 'genre_id' is the correct column name
                    $newGenre->name = $genreData['name'];
                    $newGenre->save();
                }
            }
        }
        return redirect()->route('films.index')->with('success', 'Films récupérés depuis l\'API et enregistrés avec succès.');
    }
    
    
    
    public function edit($id)
    {
        $film = Film::where('id', $id)->firstOrFail();
        return view('films.edit', compact('film'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
        ]);
    
        $film = Film::where('id', $id)->firstOrFail();
        $film->update($request->all());
    
        return redirect()->route('films.index')->with('success', 'Film mis à jour avec succès.');
    }
    
    public function destroy($movie_id)
    {
        $film = Film::where('id', $movie_id)->firstOrFail();
        $film->delete();
    
        return redirect()->route('films.index')->with('success', 'Film supprimé avec succès.');
    }
    
}