<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\PublicationType>
 */
class PublicationTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['Report', 'Briefing', 'Guide', 'Policy paper', 'Research']),
            'description' => fake()->optional()->sentence(18),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_active' => fake()->boolean(90),
        ];
    }
}
