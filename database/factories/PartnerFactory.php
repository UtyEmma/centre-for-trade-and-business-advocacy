<?php

namespace Database\Factories;

use App\Models\PartnerType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'partner_type_id' => PartnerType::factory(),
            'name' => fake()->unique()->company(),
            'website_url' => fake()->optional()->url(),
            'description' => fake()->paragraphs(2, true),
            'is_featured' => fake()->boolean(30),
            'is_published' => fake()->boolean(90),
            'sort_order' => fake()->numberBetween(1, 50),
        ];
    }
}
