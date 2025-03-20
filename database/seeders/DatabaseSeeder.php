<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        if (env('APP_ENV') == 'local') {
            $this->call([
                AnimalSeeder::class,
                ColorSeeder::class,
                DiagnoseSeeder::class,
                ServiceSeeder::class,
                TypeSeeder::class,
                LocationSeeder::class,
                UserSeeder::class,
                OwnerSeeder::class,
                PatientSeeder::class,
                CheckupSeeder::class,
                InvoiceSeeder::class,
            ]);
        } else {
            $this->call([
                LocationSeeder::class,
                UserDeploySeeder::class,
            ]);
        }
    }
}
