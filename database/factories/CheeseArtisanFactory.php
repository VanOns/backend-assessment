<?php

namespace Database\Factories;

use App\Models\CheeseArtisan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CheeseArtisanFactory extends Factory
{
    protected $model = CheeseArtisan::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'rating' => $this->faker->randomFloat(0, 1, 10),
            'production_capacity' => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
