<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->words(3, true),
            'icon' => 'heroicon-o-sparkles',
            'summary' => fake()->sentence(16),
            'description' => fake()->paragraphs(3, true),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_featured' => fake()->boolean(30),
            'is_published' => fake()->boolean(85),
        ];
    }
}
