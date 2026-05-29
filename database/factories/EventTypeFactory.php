<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\EventType>
 */
class EventTypeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement(['Workshop', 'Webinar', 'Conference', 'Training', 'Roundtable']),
            'description' => fake()->optional()->sentence(18),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_active' => fake()->boolean(90),
        ];
    }
}
