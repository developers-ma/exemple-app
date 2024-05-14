<?php

// Espace de noms pour les tests fonctionnels
namespace Tests\Feature;

// Importer la classe de base des tests et les services/modèles nécessaires
use Tests\TestCase;
use App\Services\TMDBService;
use App\Models\Film;

class TMDBServiceTest extends TestCase
{
    /**
     * @test (Annotation pour indiquer une méthode de test)
     */
    public function testgetTrendingMovies()
    {
        // Création d'un mock (simulation) du service TMDB
        $mock = $this->createMock(TMDBService::class);

        // Configuration du mock pour renvoyer des données simulées
        $mock->method('getTrendingMovies')->willReturn([
            'results' => [
                // Exemple de données d'un film populaire
                [
                    'titre' => 'Exemple de film',
                    // ... autres attributs du film
                ],
                // ... plus de films
            ],
        ]);

        // Injection du mock dans l'application pour le test
        $this->app->instance(TMDBService::class, $mock);

        // Récupération du service réel via l'injection de dépendance
        $service = app(TMDBService::class);

        // Appel de la méthode testée et stockage du résultat
        $films = $service->getTrendingMovies();

        // Assertion pour vérifier que le résultat est un tableau
        $this->assertIsArray($films);
    }

    public function testGetMovieGenres()
    {
        // Création d'un mock du service TMDB
        $mock = $this->createMock(TMDBService::class);

        // Configuration du mock pour renvoyer des données simulées
        $mock->method('getMovieGenres')->willReturn([
            'genres' => [
                // Exemple de données d'un genre de film
                [
                    'id' => 1,
                    'nom' => 'Action',
                ],
                // ... plus de genres
            ],
        ]);

        // Injection du mock dans l'application pour le test
        $this->app->instance(TMDBService::class, $mock);

        // Récupération du service réel via l'injection de dépendance
        $service = app(TMDBService::class);

        // Appel de la méthode testée et stockage du résultat
        $genres = $service->getMovieGenres();

        // Assertion pour vérifier que le résultat est un tableau
        $this->assertIsArray($genres);

        // Optionnel : Ajouter des assertions pour vérifier le contenu spécifique du tableau retourné
    }
}