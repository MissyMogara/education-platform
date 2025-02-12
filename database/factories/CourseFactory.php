<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use App\Enums\CategoryType;
use App\Models\Category;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'category_id' => Category::inRandomOrder()->first()->id,
            'teacher_id' => User::where('role', 'teacher')->inRandomOrder()->first()->id,
            'duration' => $this->faker->numberBetween(5, 100),
            'status' => $this->faker->randomElement(['active', 'finished', 'cancelled']),
        ];
    }
}
