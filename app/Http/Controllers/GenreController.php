<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Affiche tous les genres.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        // Récupère tous les genres depuis la base de données
        $genres = Genre::all();
        
        // Retourne la vue 'genres' en passant les genres récupérés à la vue
        return view('genres', compact('genres'));
    }
}