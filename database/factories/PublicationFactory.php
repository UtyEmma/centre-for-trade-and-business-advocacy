<?php

namespace Database\Factories;

use App\Models\PublicationType;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Publication>
 */
class PublicationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'publication_type_id' => PublicationType::factory(),
            'service_id' => fake()->boolean(70) ? Service::factory() : null,
            'title' => fake()->unique()->sentence(6),
            'summary' => fake()->sentence(20),
            'publication_year' => fake()->numberBetween(2018, (int) date('Y')),
            'published_at' => fake()->dateTimeBetween('-5 years', 'now'),
            'external_url' => fake()->optional()->url(),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_featured' => fake()->boolean(25),
            'is_published' => fake()->boolean(85),
        ];
    }
}
