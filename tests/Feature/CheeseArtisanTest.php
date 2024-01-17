<?php

namespace Feature;

use App\Models\CheeseArtisan;
use App\Models\DairyFarm;
use Tests\TestCase;

class CheeseArtisanTest extends TestCase
{
    public function test_the_cheese_artisan_store_returns_success(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function test_the_cheese_artisan_store_returns_error_when_name_is_missing(): void
    {
        $response = $this->post('/cheese-artisans', [
            'rating' => 10,
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_the_cheese_artisan_store_returns_error_when_rating_is_missing(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['rating']);
    }

    public function test_the_cheese_artisan_store_returns_error_when_production_capacity_is_missing(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['production_capacity']);
    }

    public function test_the_cheese_artisan_store_returns_error_when_rating_is_not_a_integer(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 'not a integer',
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['rating']);
    }

    public function test_the_cheese_artisan_store_returns_error_when_production_capacity_is_not_a_integer(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
            'production_capacity' => 'not a integer',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['production_capacity']);
    }

    public function test_the_cheese_artisan_store_returns_error_when_rating_is_not_between_01_and_10(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 11,
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['rating']);
    }

    public function test_the_cheese_artisan_store_returns_error_when_rating_is_float(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 9.5,
            'production_capacity' => 5000,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['rating']);
    }

    /**
     * Relationships
     */
    public function test_the_cheese_artisan_store_returns_success_when_dairy_farm_ids_is_a_valid_id(): void
    {
        $name = 'Test Cheese Artisan ' . uniqid();
        $id = DairyFarm::max('id');

        $response = $this->post('/cheese-artisans', [
            'name' => $name,
            'rating' => 10,
            'production_capacity' => 5000,
            'dairy_farm_ids' => [$id],
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $cheeseArtisan = CheeseArtisan::where('name', $name)->first();
        $this->assertNotNull($cheeseArtisan);

        $this->assertDatabaseHas('cheese_artisan_dairy_farm', [
            'cheese_artisan_id' => $cheeseArtisan->id,
            'dairy_farm_id' => $id,
        ]);
    }

    public function test_the_cheese_artisan_store_returns_error_when_dairy_farm_ids_is_not_an_array(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
            'production_capacity' => 5000,
            'dairy_farm_ids' => 'not an array',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['dairy_farm_id']);
    }

    public function test_the_cheese_artisan_store_returns_error_when_dairy_farm_ids_contains_a_invalid_id(): void
    {
        $ids = DairyFarm::pluck('id')->toArray() + [DairyFarm::max('id') + 1];

        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
            'production_capacity' => 5000,
            'dairy_farm_ids' => $ids,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['dairy_farm_id']);
    }

    public function test_the_cheese_artisan_store_returns_success_when_dairy_farm_ids_is_empty(): void
    {
        $response = $this->post('/cheese-artisans', [
            'name' => 'Test Cheese Artisan',
            'rating' => 10,
            'production_capacity' => 5000,
            'dairy_farm_ids' => [],
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
