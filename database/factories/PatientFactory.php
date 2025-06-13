<?php

namespace Database\Factories;

use App\Models\Color;
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
    private $vaccines = [
        "Rabies",
        "Parvovirus",
        "Distemper",
        "Hepatitis",
        "Leptospirosis",
        "Feline Panleukopenia",
        "Feline Rhinotracheitis",
        "Calicivirus",
        "Feline Leukemia Virus (FeLV)",
        "Bordetella",
        "Canine Influenza",
        "Lyme Disease",
        "Clostridium",
        "Foot and Mouth Disease",
        "Newcastle Disease (Tetelo)",
        "Gumboro",
        "Duck Plague",
        "Anthrax",
        "Brucellosis",
        "Erysipelas",
        "Pasteurellosis",
        "Pox Virus",
        "Salmonella",
        "Vitamin C Injection",
    ];
    public function definition(): array
    {
        return [
            "owner_id" => fake()->numberBetween(1, 10),
            "animal_id" => fake()->numberBetween(1, 10),
            "type_id" => fake()->numberBetween(1, 10),
            "color_id" => fake()->numberBetween(1, Color::count()),
            "vaccine" => $this->vaccines[fake()->numberBetween(0, count($this->vaccines) - 1)],
            "name" => fake()->name(),
            "birth" => fake()->dateTimeBetween('-3 years', 'now'),
            "gender" => fake()->randomElement(["Jantan", "Betina"]),
        ];
    }
}
