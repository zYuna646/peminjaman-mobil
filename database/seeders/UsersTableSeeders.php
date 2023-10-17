<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'password' => Hash::make('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'Pengguna1',
            'username' => 'pengguna1',
            'email' => 'pengguna@example.com',
            'role' => 'pengguna',
            'password' => Hash::make('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'Pengguna2',
            'username' => 'pengguna2',
            'email' => 'pengguna2@example.com',
            'role' => 'pengguna',
            'password' => Hash::make('12345'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        
    }
}
