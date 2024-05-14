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

class FilmControllerTest extends TestCase
{
    use RefreshDatabase;

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
}