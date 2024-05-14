<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;
use GuzzleHttp\Client;
use App\Models\Film;

class TMDBService
{
    /**
     * Récupère les films populaires depuis l'API et les enregistre en base de données.
     *
     * @return array
     */
    public function getTrendingMovies(): array
    {
        // Création d'un client Guzzle pour effectuer les requêtes HTTP
        $client = new Client();

        // Effectuer une requête GET à l'API TMDB pour les films populaires
        $response = $client->request('GET', 'https://api.themoviedb.org/3/trending/all/day?language=en', [
            'headers' => [
                'Authorization' => 'Bearer ' . Config::get('tmdb.api_key'),
                'accept' => 'application/json',
            ],
        ]);

        // Décodage de la réponse JSON en tableau associatif
        $data = json_decode($response->getBody(), true);

        $movies = [];
        foreach ($data['results'] as $movie) {
            // Vérifier si le film existe déjà dans la base de données locale
            $existingMovie = Film::where('movie_id', $movie['id'])->first();

            if (!$existingMovie) {
                // Créer un nouveau film s'il n'existe pas déjà
                $newMovie = new Film();
                $newMovie->movie_id = $movie['id'];
                $newMovie->title = $movie['title'] ?? $movie['original_title'] ?? $movie['name'] ?? $movie['original_name'] ?? ''; //Parfois, le titre n'existe pas. Pour éviter cela, on peut utiliser le nom original ou le titre original.
                $newMovie->description = isset($movie['overview']) ? $movie['overview'] : '';
                $newMovie->image_url = isset($movie['poster_path']) ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : '';
                // Convertir le tableau genre_ids en JSON avant l'insertion
                $newMovie->genre_ids = isset($movie['genre_ids']) && is_array($movie['genre_ids']) ? json_encode($movie['genre_ids']) : '[]';
                $newMovie->save();
                $movies[] = $newMovie;
            } else {
                // Ajouter le film existant au tableau
                $existingMovie->genre_ids = json_decode($existingMovie->genre_ids, true);
                $movies[] = $existingMovie;
            }
        }

        return $movies;
    }

    /**
     * Récupère les genres de films depuis l'API TMDB.
     *
     * @return array
     */
    public function getMovieGenres(): array
    {
        // Création d'un client Guzzle pour effectuer les requêtes HTTP
        $allGenres = new Client();

        try {
            // Effectuer une requête GET à l'API TMDB pour les genres de films
            $response_genres = $allGenres->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?language=en', [
                'headers' => [
                    'Authorization' => 'Bearer ' . Config::get('tmdb.api_key'),
                    'accept' => 'application/json',
                ],
            ]);

            // Décodage de la réponse JSON en tableau associatif
            $data_genres = json_decode($response_genres->getBody(), true);

            $genres = [];
            // Vérifier si la réponse contient des genres
            if (isset($data_genres['genres'])) {
                foreach ($data_genres['genres'] as $genre) {
                    // Ajouter chaque genre au tableau
                    $genres[] = [
                        'genre_id' => $genre['id'],
                        'name' => $genre['name']
                    ];
                }
            } else {
                // Gérer le cas où aucun genre n'est trouvé
                return [];
            }

            return $genres;
        } catch (\Exception $e) {
            // Gérer toutes les exceptions qui se produisent pendant la requête
            return [];
        }
    }
}