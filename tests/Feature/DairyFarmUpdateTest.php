<?php

namespace Feature;

use App\Models\DairyFarm;
use Tests\TestCase;

class DairyFarmUpdateTest extends TestCase
{
    public function test_the_dairy_farm_edit_returns_success(): void
    {
        $dairyFarm = DairyFarm::first();
        $response = $this->get("/dairy-farms/{$dairyFarm->id}/edit");

        $response->assertStatus(200);
    }

    public function test_the_dairy_farm_update_returns_success(): void
    {
        $dairyFarm = DairyFarm::first();
        $response = $this->put("/dairy-farms/{$dairyFarm->id}", [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function test_the_dairy_farm_update_returns_error_when_name_is_missing(): void
    {
        $dairyFarm = DairyFarm::first();
        $response = $this->put("/dairy-farms/{$dairyFarm->id}", [
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name']);
    }

    public function test_the_dairy_farm_update_returns_not_found_when_id_is_invalid(): void
    {
        $id = DairyFarm::max('id') + 1;

        $response = $this->put("/dairy-farms/{$id}", [
            'name' => 'Test Dairy Farm',
            'number_of_cows' => 100,
            'milk_quality' => 0.6,
        ]);

        $response->assertStatus(404);
    }
}
