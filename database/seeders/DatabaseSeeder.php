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
        $this->call([
            CategorySeeder::class,
        ]);

        //  ADMIN
        User::factory()->create([
            'name' => 'Miqotilla',
            'email' => 'miqotilla@example.com',
            'dni' => '55668855M',
            'password' => '1234',
            'role' => 'admin'
        ]);

        // TEACHERS
        $this->call([
            TeacherSeeder::class,
        ]);

        //  STUDENTS
        User::factory()->create([
            'name' => 'Mini Aura',
            'email' => 'miniaura@example.com',
            'dni' => '11223355M',
            'password' => '1234',
            'role' => 'student'
        ]);

        // COURSES
        $this->call([
            CourseSeeder::class,
        ]);
    }
}
