<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Teknisi Utama',
                'email' => 'teknisi@example.com',
                'password' => Hash::make('password123'),
                'role' => 'technician',
            ],
            [
                'name' => 'Teknisi Kedua',
                'email' => 'teknisi2@example.com',
                'password' => Hash::make('password123'),
                'role' => 'technician',
            ],

        ];

        // Sales 1
        User::create([
            'name' => 'Sales Marketing',
            'email' => 'sales@example.com',
            'password' => Hash::make('password123'),
            'role' => 'sales',
        ]); 

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // cek berdasarkan email
                $user // kalau ada → update, kalau belum → create
            );
        }
    }
}
