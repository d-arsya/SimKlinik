<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "owner_id" => fake()->numberBetween(1, 10),
            "animal_id" => fake()->numberBetween(1, 10),
            "type_id" => fake()->numberBetween(1, 10),
            "color_id" => fake()->numberBetween(1, 10),
            "vaccine" => fake()->words(2, true),
            "name" => fake()->name(),
            "birth" => fake()->date(),
            "gender" => fake()->randomElement(["Jantan", "Betina"]),
        ];
    }
}
