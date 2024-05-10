<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                ['title' => $film['title']],
                ['description' => $film['description'], 'image_url' => $film['image_url']]
            );
        }

        return redirect()->route('films.index')->with('success', 'Films récupérés et enregistrés avec succès.');
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image_url' => 'required|url',
        ]);

        $film->update($request->all());

        return redirect()->route('films.index')->with('success', 'Film mis à jour avec succès.');
    }

    public function destroy(Film $film)
    {
        $film->delete();

        return redirect()->route('films.index')->with('success', 'Film supprimé avec succès.');
    }
}