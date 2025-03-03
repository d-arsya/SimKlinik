<?php

namespace Database\Seeders;

use App\Models\Checkup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Checkup::factory(5)->create(["patient_id" => $i]);
        }
    }
}
