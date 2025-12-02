<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(rand(4, 8)),
            'description' => fake()->sentence(10),
            'deadline' => fake()->date(),
            'status' => fake()->randomElement(['To Do', 'In Progress', 'Done']),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'deadline' => null,
        ]);
    }
}
