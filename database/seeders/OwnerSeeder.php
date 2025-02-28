<?php

namespace Database\Seeders;

use App\Models\Owner;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $village = Village::find(fake()->numberBetween(1, Village::all()->count()));
            Owner::factory(2)->create([
                "province_id" => $village->district->city->province->id,
                "city_id" => $village->district->city->id,
                "district_id" => $village->district->id,
                "village_id" => $village->id
            ]);
        }
    }
}
