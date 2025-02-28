<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $number = Animal::all()->count();
        for ($i = 1; $i <= $number; $i++) {
            Color::factory(2)->create(["animal_id" => $i]);
        }
    }
}
