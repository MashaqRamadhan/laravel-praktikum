<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder untuk majors terlebih dahulu, lalu students
        $this->call([
            MajorsSeeder::class,
        ]);

        // User admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => '112233',
            'role' => 'admin',
        ]);

        // Jalankan seeder untuk students setelah majors dan user admin
        $this->call([
            StudentSeeder::class,
        ]);
    }
}