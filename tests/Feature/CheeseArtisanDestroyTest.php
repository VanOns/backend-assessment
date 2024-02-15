<?php

namespace Feature;

use App\Models\CheeseArtisan;
use App\Models\DairyFarm;
use Tests\TestCase;

class CheeseArtisanDestroyTest extends TestCase
{
    public function test_the_cheese_artisan_destroy_returns_success(): void
    {
        $cheeseArtisan = CheeseArtisan::first();
        $response = $this->delete("/cheese-artisans/{$cheeseArtisan->id}");

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();
    }

    public function test_the_cheese_artisan_destroy_returns_not_found_when_id_is_invalid(): void
    {
        $id = CheeseArtisan::max('id') + 1;

        $response = $this->delete("/cheese-artisans/{$id}");

        $response->assertStatus(404);
    }

    public function test_the_cheese_artisan_destroy_deletes_relationships(): void
    {
        $cheeseArtisan = CheeseArtisan::first();

        $dairyFarms = DairyFarm::inRandomOrder()->limit(3)->get();

        $cheeseArtisan->dairyFarms()->attach($dairyFarms->pluck('id'));

        $response = $this->delete("/cheese-artisans/{$cheeseArtisan->id}");

        $response->assertStatus(302);
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('cheese_artisan_dairy_farm', [
            'cheese_artisan_id' => $cheeseArtisan->id,
        ]);
    }
}
