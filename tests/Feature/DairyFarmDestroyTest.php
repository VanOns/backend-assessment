<?php

namespace Feature;

use App\Models\CheeseArtisan;
use App\Models\DairyFarm;
use Tests\TestCase;

class DairyFarmDestroyTest extends TestCase
{
    public function test_the_dairy_farm_destroy_returns_success(): void
    {
        $dairyFarm = DairyFarm::first();

        $response = $this->delete("/dairy-farms/{$dairyFarm->id}");

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function test_the_dairy_farm_destroy_returns_not_found_when_id_is_invalid(): void
    {
        $id = DairyFarm::max('id') + 1;

        $response = $this->delete("/dairy-farms/{$id}");

        $response->assertStatus(404);
    }

    public function test_the_dairy_farm_destroy_deletes_relationships(): void
    {
        $dairyFarm = DairyFarm::first();
        $cheeseArtisans = CheeseArtisan::inRandomOrder()->limit(3)->get();

        $dairyFarm->cheeseArtisans()->attach($cheeseArtisans->pluck('id'));

        $response = $this->delete("/dairy-farms/{$dairyFarm->id}");

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('cheese_artisan_dairy_farm', [
            'dairy_farm_id' => $dairyFarm->id,
        ]);
    }
}
