<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FilmTest extends TestCase
{
    /**
     * A basic feature test example.
     */
       public function it_can_create_a_film()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $film = Film::factory()->create([
            'title' => 'Example Film',
            'description' => 'Description of the film',
            'image_url' => 'example.jpg',
            // Add any other attributes here
        ]);

    }
}