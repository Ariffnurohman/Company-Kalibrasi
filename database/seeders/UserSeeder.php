<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Teknisi
        User::create([
            'name' => 'Teknisi Utama',
            'email' => 'teknisi@example.com',
            'password' => Hash::make('password123'),
            'role' => 'teknisi',
        ]);
    }
}
