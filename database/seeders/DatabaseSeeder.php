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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Miqotilla',
            'email' => 'miqotilla@example.com',
            'dni' => '55668855M',
            'password' => '1234',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'Aura',
            'email' => 'aura@example.com',
            'dni' => '11223344A',
            'password' => '1234',
            'role' => 'teacher'
        ]);

        User::factory()->create([
            'name' => 'Mini Aura',
            'email' => 'miniaura@example.com',
            'dni' => '11223355M',
            'password' => '1234',
            'role' => 'student'
        ]);
    }
}
