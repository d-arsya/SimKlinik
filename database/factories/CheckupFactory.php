<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Queue>
 */
class CheckupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = json_encode([["id" => fake()->numberBetween(1, 10), "days" => fake()->numberBetween(1, 5)], ["id" => fake()->numberBetween(1, 10), "days" => fake()->numberBetween(1, 5)], ["id" => fake()->numberBetween(1, 10), "days" => fake()->numberBetween(1, 5)]]);
        $diagnoses = json_encode([fake()->numberBetween(1, 10), fake()->numberBetween(1, 10), fake()->numberBetween(1, 10)]);
        $drugs = json_encode([["id" => fake()->numberBetween(1, 10), "date" => fake()->date(), "type" => fake()->word(), "name" => fake()->word(4), "amount" => fake()->numberBetween(1, 10), "notes" => fake()->sentence(5)], ["id" => fake()->numberBetween(1, 10), "date" => fake()->date(), "type" => fake()->word(), "name" => fake()->word(4), "amount" => fake()->numberBetween(1, 10), "notes" => fake()->sentence(5)], ["id" => fake()->numberBetween(1, 10), "date" => fake()->date(), "type" => fake()->word(), "name" => fake()->word(4), "amount" => fake()->numberBetween(1, 10), "notes" => fake()->sentence(5)]]);
        return [
            "pulse" => fake()->randomFloat(1, 30, 100),
            "temperature" => fake()->numberBetween(30, 100),
            "breath" => fake()->randomFloat(1, 30, 100),
            "weight" => fake()->randomFloat(1, 10, 200),
            "anamnesis" => fake()->sentence(15),
            "symptom" => fake()->sentence(15),
            "status" => fake()->randomElement(['diperiksa', 'menunggu', 'dibatalkan']),
            "services" => $services,
            "diagnoses" => $diagnoses,
            "drugs" => $drugs,
            "doctor_id" => fake()->numberBetween(1, 4)
        ];
    }
}
