<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@correo.com',
            'password' => bcrypt('contraseña'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Test Editor',
            'email' => 'editor@correo.com',
            'role' => 'editor',
            'password' => bcrypt('contraseña'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
