<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $number = Province::all()->count();
        for ($i = 1; $i <= $number; $i++) {
            City::factory(10)->create(["province_id" => $i]);
        }
    }
}
