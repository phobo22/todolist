<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => fake()->word(rand(4, 8)),
            'description' => fake()->sentence(10),
            'category' => fake()->randomElement(['cat1', 'cat2', 'cat3']),
            'deadline' => fake()->date('Y-m-d'),
            'status' => fake()->randomElement(['0', '1', '2']),
        ];
    }
}
