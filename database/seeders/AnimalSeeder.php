<?php

namespace Database\Seeders;

use App\Models\Animal;
use Database\Factories\AnimalFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Animal::factory(10)->create();
    }
}
