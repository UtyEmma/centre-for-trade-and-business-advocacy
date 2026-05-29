<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\TeamCategory>
 */
class TeamCategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['Board', 'Leadership', 'Program team', 'Advisors', 'Secretariat']),
            'description' => fake()->optional()->sentence(18),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_active' => fake()->boolean(90),
        ];
    }
}
