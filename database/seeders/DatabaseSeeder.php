<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::factory(10)->create();

        User::create([
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Test User',
            'email' => 'doctor@doctor.com',
            'password' => Hash::make('doctor'),
            'role' => 'doctor'
        ]);
        User::create([
            'name' => 'Test User',
            'email' => 'owner@owner.com',
            'password' => Hash::make('owner'),
            'role' => 'owner'
        ]);
        User::create([
            'name' => 'Test User',
            'email' => 'super@super.com',
            'password' => Hash::make('super'),
            'role' => 'super'
        ]);
    }
}
