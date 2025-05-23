<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "discount" => fake()->numberBetween(0, 20),
            "paid" => fake()->randomElement([fake()->dateTime(), null]),
            "method" => fake()->randomElement(['cash', 'credit', 'transfer']),
            "notes" => fake()->sentence(4)
        ];
    }
}
