<?php

namespace App\Services;

use GuzzleHttp\Client;
use App\Models\Film;

class TMDBService
{
    
    public function getTrendingMovies()
    {
       
        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.themoviedb.org/3/trending/all/day?language=en-US', [
        'headers' => [
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo',
            'accept' => 'application/json',
        ],
        ]);

        $data = json_decode($response->getBody(), true);

        $movies = [];
        foreach ($data['results'] as $movie) {
            // Check if the movie already exists in the database
            $existingMovie = Film::where('movie_id', $movie['id'])->first();

            if (!$existingMovie) {
                // Movie doesn't exist, create a new one
                $newMovie = new Film();
                $newMovie->movie_id = $movie['id'];
                $newMovie->title = isset($movie['title']) ? $movie['title'] : '';
                $newMovie->description = isset($movie['overview']) ? $movie['overview'] : '';
                $newMovie->image_url = isset($movie['poster_path']) ? 'https://image.tmdb.org/t/p/w500' . $movie['poster_path'] : '';
                $newMovie->save();

                $movies[] = $newMovie;
            } else {
                // Movie already exists, just add to the array
                $movies[] = $existingMovie;
            }
        }

        return $movies;
    }
}