<?php

namespace Database\Factories;

use App\Models\DairyFarm;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class DairyFarmFactory extends Factory
{
    protected $model = DairyFarm::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'number_of_cows' => $this->faker->randomNumber(),
            'milk_quality' => $this->faker->randomFloat(2, 0, 1),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
