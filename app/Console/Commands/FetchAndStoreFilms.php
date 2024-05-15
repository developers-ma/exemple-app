<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Http\Controllers\FilmController;
use App\Http\Requests\FilmRequest;
use App\Http\Requests\GenreRequest;
use App\Services\TMDBService;

class FetchAndStoreFilms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-and-store-films';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store films';

    /**
     * Execute the console command.
     */
    public function handle(FilmController $filmController)
    {
        // Resolve the dependencies and call the fetchAndStore method
        $filmRequest = app()->make(FilmRequest::class);
        $genreRequest = app()->make(GenreRequest::class);
        $tmdbService = app()->make(TMDBService::class);

        $filmController->fetchAndStore($filmRequest, $genreRequest, $tmdbService);
    }
}