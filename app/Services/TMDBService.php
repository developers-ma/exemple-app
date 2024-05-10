<?php

namespace App\Services;

use GuzzleHttp\Client;

class TMDBService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://api.themoviedb.org/3/',
        ]);
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function getTrendingMovies()
    {
        $response = $this->client->request('GET', 'trending/movie/day', [
            'query' => [
                'api_key' => $this->apiKey,
                'language' => 'fr-FR',
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        $movies = [];
        foreach ($data['results'] as $movie) {
            $movies[] = [
                'id' => $movie['id'], // assuming you want to use TMDb ID
                'title' => $movie['title'],
                'description' => $movie['overview'],
                'image_url' => 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'],
            ];
        }

        return $movies;
    }
}