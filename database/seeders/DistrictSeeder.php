<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $number = City::all()->count();
        for ($i = 1; $i <= $number; $i++) {
            District::factory(5)->create(["city_id" => $i]);
        }
    }
}
