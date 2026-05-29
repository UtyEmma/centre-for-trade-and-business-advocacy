<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\PartnerType>
 */
class PartnerTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['Government', 'Development partner', 'Private sector', 'Academic', 'Civil society']),
            'description' => fake()->optional()->sentence(18),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_active' => fake()->boolean(90),
        ];
    }
}
