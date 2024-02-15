<?php

namespace Feature;

use App\Models\CheeseArtisan;
use App\Models\DairyFarm;
use Tests\TestCase;

class DairyFarmStoreTest extends TestCase
{
    public function test_the_dairy_farm_store_returns_success(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function test_the_dairy_farm_store_returns_error_when_name_is_missing(): void
    {
        $response = $this->post('/dairy-farms', [
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_the_dairy_farm_store_returns_error_when_number_of_cows_is_missing(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'milk_quality' => 0.6,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['number_of_cows']);
    }

    public function test_the_dairy_farm_store_returns_error_when_milk_quality_is_missing(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['milk_quality']);
    }

    public function test_the_dairy_farm_store_returns_error_when_number_of_cows_is_not_an_integer(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 'not an integer',
            'milk_quality' => 0.6,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['number_of_cows']);
    }

    public function test_the_dairy_farm_store_returns_error_when_milk_quality_is_not_an_integer(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 'not an integer',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['milk_quality']);
    }

    public function test_the_dairy_farm_store_returns_error_when_milk_quality_is_not_between_01_and_10(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 1.1,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['milk_quality']);
    }

    public function test_the_dairy_farm_store_returns_error_when_milk_quality_is_not_between_01_and_10_2(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => -0.1,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['milk_quality']);
    }

    public function test_the_dairy_farm_store_returns_error_when_milk_quality_is_not_between_01_and_10_3(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => -1,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['milk_quality']);
    }

    /**
     * Relationships
     */
    public function test_the_dairy_farm_store_returns_success_when_cheese_artisan_ids_contains_a_valid_id(): void
    {
        $name = 'Test Dairy Farm' . uniqid();
        $id = CheeseArtisan::max('id');

        $response = $this->post('/dairy-farms', [
            'name' => $name,
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
            'cheese_artisan_ids' => [$id],
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $dairyFarm = DairyFarm::where('name', $name)->first();
        $this->assertNotNull($dairyFarm);

        $this->assertDatabaseHas('cheese_artisan_dairy_farm', [
            'cheese_artisan_id' => $id,
            'dairy_farm_id' => $dairyFarm->id,
        ]);
    }

    public function test_the_dairy_farm_store_returns_error_when_cheese_artisan_ids_is_not_an_array(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
            'cheese_artisan_ids' => 'not an array',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['cheese_artisan_ids']);
    }

    public function test_the_dairy_farm_store_returns_error_when_cheese_artisan_ids_contains_a_invalid_id(): void
    {
        $ids = CheeseArtisan::pluck('id')->push(CheeseArtisan::max('id') + 1)->toArray();

        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
            'cheese_artisan_ids' => $ids,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['cheese_artisan_ids.*']);
    }

    public function test_the_dairy_farm_store_returns_success_when_cheese_artisan_ids_is_empty(): void
    {
        $response = $this->post('/dairy-farms', [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
            'cheese_artisan_ids' => [],
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }
}
