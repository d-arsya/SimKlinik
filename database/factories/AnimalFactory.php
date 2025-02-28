<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "pulse" => fake()->randomFloat(1, 30, 100),
            "temperature" => fake()->numberBetween(30, 100),
            "breath" => fake()->randomFloat(1, 30, 100),
        ];
    }
}
