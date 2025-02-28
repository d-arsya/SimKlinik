<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $number = District::all()->count();
        for ($i = 1; $i <= $number; $i++) {
            Village::factory(5)->create(["district_id" => $i]);
        }
    }
}
