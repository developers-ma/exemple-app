<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
    public function handle()
    {
        // Call the fetchAndStore() method here
        \App::make(\App\Http\Controllers\FilmController::class)->fetchAndStore();
    }
}