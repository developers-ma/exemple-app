<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Film;

class FilmModelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testItCanCreateAFilm()
    {
        $this->withoutExceptionHandling(); // Add this line if you want to see detailed error messages

        $user = User::factory()->create();

        $this->actingAs($user);

        $film = Film::factory()->create([
            'title' => 'Example Film',
            'movie_id' => '5',
            'description' => 'Description of the film',
            'image_url' => 'example.jpg',
        ]);

        // Add your assertions here if needed
        $this->assertDatabaseHas('films', [
            'title' => 'Example Film',
            'movie_id' => '5',
            'description' => 'Description of the film',
            'image_url' => 'example.jpg'
        ]);
    }
}