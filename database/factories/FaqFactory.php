<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question' => fake()->sentence() . '?',
            'answer' => fake()->paragraphs(2, true),
            'category' => fake()->randomElement(['General', 'Membership', 'Events', 'Publications']),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_published' => fake()->boolean(90),
        ];
    }
}
