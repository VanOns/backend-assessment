<?php

namespace Feature;

use App\Models\CheeseArtisan;
use Tests\TestCase;

class CheeseArtisanUpdateTest extends TestCase
{
    public function test_the_cheese_artisan_edit_returns_success(): void
    {
        $cheeseArtisan = CheeseArtisan::first();
        $response = $this->get("/cheese-artisans/{$cheeseArtisan->id}/edit");

        $response->assertStatus(200);
    }

    public function test_the_cheese_artisan_update_returns_success(): void
    {
        $cheeseArtisan = CheeseArtisan::first();
        $response = $this->put("/cheese-artisans/{$cheeseArtisan->id}", [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function test_the_cheese_artisan_update_returns_error_when_name_is_missing(): void
    {
        $cheeseArtisan = CheeseArtisan::first();
        $response = $this->put("/cheese-artisans/{$cheeseArtisan->id}", [
            'rating' => 10,
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_the_cheese_artisan_update_returns_not_found_when_id_is_invalid(): void
    {
        $id = CheeseArtisan::max('id') + 1;

        $response = $this->put("/cheese-artisans/{$id}", [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(404);
    }
}
