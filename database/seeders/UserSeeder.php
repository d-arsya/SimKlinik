<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 11; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => "doctor{$i}@doctor.com",
                'password' => Hash::make('doctor'),
                'role' => 'doctor'
            ]);
        }
        User::create([
            'name' => fake()->name(),
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'owner@owner.com',
            'password' => Hash::make('owner'),
            'role' => 'owner'
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'super@super.com',
            'password' => Hash::make('super'),
            'role' => 'super'
        ]);
    }
}
