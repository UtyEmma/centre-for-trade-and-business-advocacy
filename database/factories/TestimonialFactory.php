<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'role' => fake()->jobTitle(),
            'organization' => fake()->company(),
            'location' => fake()->city(),
            'quote' => fake()->paragraph(),
            'rating' => fake()->numberBetween(3, 5),
            'website_url' => fake()->optional()->url(),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_featured' => fake()->boolean(30),
            'is_published' => fake()->boolean(90),
        ];
    }
}
