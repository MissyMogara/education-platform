<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Aura',
            'email' => 'aura@example.com',
            'dni' => '91223344A',
            'password' => '1234',
            'role' => 'teacher'
        ]);
        User::factory()->create([
            'name' => 'Esky',
            'email' => 'esky@example.com',
            'dni' => '81225524E',
            'password' => '1234',
            'role' => 'teacher'
        ]);
        User::factory()->create([
            'name' => 'Vivi',
            'email' => 'vivi@example.com',
            'dni' => '73323344V',
            'password' => '1234',
            'role' => 'teacher'
        ]);
        User::factory()->create([
            'name' => 'Lunar',
            'email' => 'lunar@example.com',
            'dni' => '61229374L',
            'password' => '1234',
            'role' => 'teacher'
        ]);
        User::factory()->create([
            'name' => 'Yuri',
            'email' => 'yuri@example.com',
            'dni' => '51166344Y',
            'password' => '1234',
            'role' => 'teacher'
        ]);
        User::factory()->create([
            'name' => 'Tempest',
            'email' => 'tempest@example.com',
            'dni' => '41222144T',
            'password' => '1234',
            'role' => 'teacher'
        ]);
    }
}
