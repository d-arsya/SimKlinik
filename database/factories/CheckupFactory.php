<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Queue>
 */
class CheckupFactory extends Factory
{
    private $anamneses = [
        "Tidak mau makan sejak kemarin",
        "Lesu dan tidak aktif",
        "Sering muntah setelah makan",
        "Mencret atau feses cair",
        "Batuk dan bersin",
        "Nafas cepat dan sesak",
        "Terdapat luka pada kulit",
        "Sering menggaruk tubuh",
        "Mata berair atau bengkak",
        "Keluar cairan dari hidung",
        "Perut terlihat membesar",
        "Jalan pincang atau tidak seimbang",
        "Gusi terlihat pucat",
        "Berat badan turun drastis",
        "Sering menjilat area genital",
        "Keluar darah dari anus atau mulut",
        "Bulu rontok berlebihan",
        "Sering mengeong atau menggonggong tanpa sebab",
        "Tidak bisa buang air kecil atau besar",
        "Menggigil atau kejang secara tiba-tiba"
    ];

    private $symptoms = [
        "Demam",
        "Batuk",
        "Bersin",
        "Muntah",
        "Diare",
        "Lesu",
        "Tidak Nafsu Makan",
        "Sesak Nafas",
        "Keluar Lendir dari Hidung",
        "Mata Berair",
        "Bulu Kusam",
        "Luka Terbuka",
        "Gatal dan Menggaruk Berlebihan",
        "Kejang",
        "Jalan Pincang",
        "Perut Kembung",
        "Gusi Pucat",
        "Keluar Darah dari Anus",
        "Sering Menjilat Tubuh",
        "Bengkak pada Tubuh atau Kaki"
    ];


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $serviceIds = Service::pluck('id')->toArray();
        $count = rand(1, min(5, count($serviceIds)));
        $selectedIds = Arr::random($serviceIds, $count);

        // Map into desired structure with random days
        $services = collect($selectedIds)->map(fn($id) => [
            'id' => $id,
            'days' => fake()->numberBetween(1, 3),
        ])->toJson();
        $diagnoses = json_encode([fake()->numberBetween(1, 10), fake()->numberBetween(1, 10), fake()->numberBetween(1, 10)]);
        $drugs = json_encode([["id" => fake()->numberBetween(1, 10), "price" => fake()->numberBetween(1, 100) * 1000, "type" => fake()->word(), "name" => fake()->word(4), "amount" => fake()->numberBetween(1, 10), "notes" => fake()->sentence(5)], ["id" => fake()->numberBetween(1, 10), "price" => fake()->numberBetween(1, 100) * 1000, "type" => fake()->word(), "name" => fake()->word(4), "amount" => fake()->numberBetween(1, 10), "notes" => fake()->sentence(5)], ["id" => fake()->numberBetween(1, 10), "price" => fake()->numberBetween(1, 100) * 1000, "type" => fake()->word(), "name" => fake()->word(4), "amount" => fake()->numberBetween(1, 10), "notes" => fake()->sentence(5)]]);
        return [
            "pulse" => fake()->randomFloat(1, 30, 100),
            "temperature" => fake()->numberBetween(30, 100),
            "breath" => fake()->randomFloat(1, 30, 100),
            "weight" => fake()->randomFloat(1, 10, 200),
            "anamnesis" => $this->anamneses[fake()->numberBetween(0, count($this->anamneses) - 1)],
            "symptom" => $this->symptoms[fake()->numberBetween(0, count($this->symptoms) - 1)],
            "status" => fake()->randomElement(['diperiksa', 'menunggu', 'dibatalkan']),
            "services" => $services,
            "diagnoses" => $diagnoses,
            "drugs" => $drugs
        ];
    }
}
