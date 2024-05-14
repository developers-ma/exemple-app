<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Film;

class FilmModelTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     */
    public function testItCanCreateAFilm()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $film = Film::factory()->create([
            'title' => 'Example Film',
            'movie_id' => $this->faker->unique()->randomNumber(),
            'description' => 'Description of the film',
            'image_url' => 'https://example.com/new_image.jpg',
        ]);

        // Add your assertions here
        $this->assertDatabaseHas('films', [
            'title' => 'Example Film',
            'movie_id' => $film->movie_id, // Using $film->movie_id instead of generating another random number
            'description' => 'Description of the film',
            'image_url' => 'https://example.com/new_image.jpg',
        ]);
    }
}