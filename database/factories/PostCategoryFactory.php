<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\PostCategory>
 */
class PostCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->words(2, true),
            'description' => fake()->optional()->sentence(18),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_active' => fake()->boolean(90),
        ];
    }
}
