<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Checkup;
use App\Models\Color;
use App\Models\Invoice;
use App\Models\Owner;
use App\Models\Patient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DummyDataSeeder extends Seeder
{


    public function run(): void
    {
        Owner::factory(10)->create();
        $owners = Owner::all();
        foreach ($owners as $item) {
            for ($i = 0; $i < fake()->numberBetween(1, 4); $i++) {
                $animal = Animal::inRandomOrder()->first();
                Patient::factory()->create([
                    "owner_id" => $item->id,
                    "animal_id" => $animal->id,
                    "type_id" => $animal->types->first()->id
                ]);
            }
        }
        $patients = Patient::all();
        foreach ($patients as $item) {
            $animal = $item->animal;
            for ($i = 0; $i < fake()->numberBetween(1, 4); $i++) {
                // $status = 'menunggu';
                $queued = fake()->numberBetween(0, 1);
                if ($queued) {
                    $status = fake()->randomElement(['diperiksa', 'menunggu', 'dibatalkan']);
                } else {
                    $status = 'menunggu';
                }
                $diagnosisIds = $animal->diagnoses->pluck('id')->toArray();
                $count = rand(1, min(3, count($diagnosisIds)));
                $selectedDiagnosisIds = Arr::random($diagnosisIds, $count);
                $diagnoses = json_encode((array) $selectedDiagnosisIds);
                $time = $status == 'menunggu' ? fake()->dateTimeBetween('-12 hours', 'now') : fake()->dateTimeBetween('-5 months', '-2 days');
                $checkup = Checkup::factory()->create([
                    "patient_id" => $item->id,
                    "pulse" => fake()->randomFloat(1, $animal->pulse - 20, $animal->pulse + 20),
                    "temperature" => fake()->numberBetween($animal->temperature - 20, $animal->temperature + 20),
                    "breath" => fake()->randomFloat(1, $animal->breath - 20, $animal->breath + 20),
                    "weight" => fake()->randomFloat(1, 10, 200),
                    "status" => $status,
                    "queued" => $queued,
                    "diagnoses" => $diagnoses,
                    "drugs" => null,
                    "created_at" => $time,
                    "updated_at" => $time,
                ]);
                if ($status == 'diperiksa') {
                    $paid = fake()->dateTimeBetween($time, '+6 days');
                    $done = fake()->randomElement([$paid, null]);
                    Invoice::factory()->create([
                        "checkup_id" => $checkup->id,
                        "paid" => $done,
                        "created_at" => $paid,
                        "updated_at" => $paid,
                        "discount" => $done == null ? null : fake()->numberBetween(0, 20)
                    ]);
                }
            }
        }
    }
}
