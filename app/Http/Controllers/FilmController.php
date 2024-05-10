<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Services\TMDBService;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function fetchAndStore()
    {
        $tmdbService = new TMDBService();
        $films = $tmdbService->getTrendingMovies();
    
        foreach ($films as $film) {
            Film::updateOrCreate(
                ['movie_id' => $film['id']], // Assuming $film['id'] contains TMDb movie ID
                ['title' => $film['title'], 'description' => $film['description'], 'image_url' => $film['image_url']]
            );
        }
    
        return redirect()->route('films.index')->with('success', 'Films récupérés et enregistrés avec succès.');
    }
    
    public function edit($movie_id)
    {
        $film = Film::where('movie_id', $movie_id)->firstOrFail();
        return view('films.edit', compact('film'));
    }
    
    public function update(Request $request, $movie_id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
        ]);
    
        $film = Film::where('movie_id', $movie_id)->firstOrFail();
        $film->update($request->all());
    
        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
    }
    
    public function destroy($movie_id)
    {
        $film = Film::where('movie_id', $movie_id)->firstOrFail();
        $film->delete();
    
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
    
}