<?php

namespace Database\Factories;

use App\Models\Location;
use App\Models\Owner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        do {
            $phone = fake()->phoneNumber();
        } while (Owner::where('phone', $phone)->count() > 1);
        $kendal = Location::where('city', 'Kabupaten Kendal')->pluck('id')->toArray();
        $location = $kendal[fake()->numberBetween(0, count($kendal) - 1)];
        $loc = Location::find($location);
        $address = "{$loc['village']}, {$loc['district']}, {$loc['city']}, {$loc['province']} {$loc['postalcode']}";
        return [
            "name" => fake()->name(),
            "gender" => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            "address" => $address,
            "province" => $location,
            "city" => $location,
            "district" => $location,
            "village" => $location,
            "phone" => $phone,
        ];
    }
}
