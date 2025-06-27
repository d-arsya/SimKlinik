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
        User::create([
            'name' => fake()->name(),
            'email' => "doctor@doctor.com",
            'password' => Hash::make('doctor'),
            'role' => 'doctor'
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => 'super@super.com',
            'password' => Hash::make('super'),
            'role' => 'super'
        ]);
        User::create([
            'name' => 'Kamaluddin Arsyad Fadllillah',
            'email' => 'kamaluddin.arsyad05@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'super'
        ]);
    }
}
