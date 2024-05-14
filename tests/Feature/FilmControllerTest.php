<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\FilmFactory;
use App\Models\Film;
use App\Services\TMDBService;
use App\Models\Genre;
use App\Models\User; // Assurez-vous d'importer votre modèle User s'il n'est pas déjà importé

//livewire
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Database\Factories\GenreFactory;

class FilmControllerTest extends TestCase
{
    use RefreshDatabase;

      /**
     * Affiche les détails d'un film.
     *
     */
    public function testDetails()
    {
        // Créer un utilisateur de test
        $user = User::factory()->create();

        // Authentifier l'utilisateur
        $this->actingAs($user);

        // Créer un film de test
        $film = Film::factory()->create();

        // Accéder à l'endpoint avec l'ID du film de test
        $response = $this->get(route('film.details', ['id' => $film->id]));

        // Vérifier que la réponse est réussie
        $response->assertStatus(200);

        // Vérifier que les détails du film sont visibles sur la page
        $response->assertSee($film->title);
        $response->assertSee($film->description);
    }

     /**
     * Récupère les films populaires depuis l'API et les enregistre en base de données.
     *
     */
    public function testFetchAndStoreWithAuth()
    {
        // Créer un utilisateur et s'authentifier
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Vider les tables 'films' et 'genres' avant d'exécuter le test
        Film::truncate();
        Genre::truncate();
    
        // Exécuter la méthode fetchAndStore
        $response = $this->get(route('films.fetchAndStore'));
    
        // Vérifier que la réponse redirige
        $response->assertRedirect(route('films.index'));
    
        // Vérifier que le message de succès est présent
        $response->assertSessionHas('success', 'Films récupérés depuis l\'API et enregistrés avec succès.');
    
        // Vérifier que les films sont enregistrés dans la base de données avec des movie_id uniques
        $filmsCount = Film::count();
        $uniqueMovieIdsCount = Film::distinct('movie_id')->count();
    
        // Affirmer que le nombre total de films est égal au nombre de movie_ids uniques
        $this->assertEquals($filmsCount, $uniqueMovieIdsCount);
    
        // Vérifier que les genres sont enregistrés dans la base de données
        $genresCount = Genre::count();
    
        //  vérifier s'il existe des entrées genre_id en double
        $uniqueGenreIdsCount = Genre::distinct('genre_id')->count();
    
        // Affirmer que le nombre total de genres est égal au nombre de genre_ids uniques
        $this->assertEquals($genresCount, $uniqueGenreIdsCount);
    }
    
       /**
     * Affiche le formulaire de modification d'un film.
     *
     */
    
    public function testEdit()
    {
        // Create a user
        $user = User::factory()->create();

        // Creating a film instance
        $film = Film::factory()->create();

        // Generating URL for edit route
        $editUrl = route('film.edit', ['id' => $film->id]);

        // Acting as a user
        $response = $this->actingAs($user)->get($editUrl);

        // Asserting the response status is 200 (OK)
        $response->assertStatus(200);

        // Asserting the response contains the film data
        $response->assertSee($film->title)
                 ->assertSee($film->description)
                 ->assertSee($film->image_url);
    }

     /**
     * Met à jour les informations d'un film.
     *
     */

    public function testUpdate()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a film
        $film = Film::factory()->create();

        // New data to update the film
        $newData = [
            'title' => 'New Title',
            'description' => 'New Description',
            'image_url' => 'https://example.com/new_image.jpg',
        ];

        // Generating URL for update route
        $updateUrl = route('film.update', ['id' => $film->id]); // Adjusted route name

        // Acting as a user and sending a PUT request with new data
        $response = $this->actingAs($user)->put($updateUrl, $newData); // Used put instead of post

        // Asserting the response redirects to the films index route
        $response->assertRedirect(route('films.index'));

        // Asserting the film data is updated in the database
        $updatedFilm = Film::find($film->id);
        $this->assertEquals($newData['title'], $updatedFilm->title);
        $this->assertEquals($newData['description'], $updatedFilm->description);
        $this->assertEquals($newData['image_url'], $updatedFilm->image_url);
    }

    /**
     * Supprime un film de la base de données.
     *
     */
    public function testDestroy()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a film
        $film = Film::factory()->create();

        // Generating URL for destroy route
        $destroyUrl = route('film.destroy', ['id' => $film->id]);

        // Acting as a user and sending a DELETE request
        $response = $this->actingAs($user)->delete($destroyUrl);

        // Asserting the response redirects to the films index route
        $response->assertRedirect(route('films.index'));

        // Asserting the film is deleted from the database
        $this->assertNull(Film::find($film->id));
    }
    
    /**
     * Livewire test
     *
     */
    public function it_searches_for_films_by_title_and_genre()
    {
        // Create genres
        $genre1 = Genre::factory()->create(['genre_id' => 1]);
        $genre2 = Genre::factory()->create(['genre_id' => 2]);

        // Create films with genre_ids
        $film1 = Film::factory()->create(['title' => 'Film 1', 'genre_ids' => [1]]);
        $film2 = Film::factory()->create(['title' => 'Film 2', 'genre_ids' => [1]]);
        $film3 = Film::factory()->create(['title' => 'Film 3', 'genre_ids' => [2]]);

        Livewire::test('search')
            ->assertSee($film1->title) // Assert film 1 is visible
            ->assertSee($film2->title) // Assert film 2 is visible
            ->assertSee($film3->title) // Assert film 3 is visible
            ->set('searchTitle', 'Film 1') // Set search title to filter films
            ->assertSee($film1->title) // Assert film 1 is still visible
            ->assertDontSee($film2->title) // Assert film 2 is not visible after search
            ->assertDontSee($film3->title) // Assert film 3 is not visible after search
            ->set('selectedGenre', $genre1->genre_id) // Set selected genre to filter films
            ->assertSee($film1->title) // Assert film 1 is still visible after filtering by genre
            ->assertDontSee($film2->title) // Assert film 2 is not visible after filtering by genre
            ->assertDontSee($film3->title); // Assert film 3 is not visible after filtering by genre
    }
    
}