<?php

namespace Database\Factories;

use App\Models\TeamCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\TeamMember>
 */
class TeamMemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'team_category_id' => TeamCategory::factory(),
            'name' => fake()->name(),
            'role' => fake()->jobTitle(),
            'bio' => fake()->paragraphs(3, true),
            'email' => fake()->safeEmail(),
            'linkedin_url' => fake()->optional()->url(),
            'sort_order' => fake()->numberBetween(1, 50),
            'is_published' => fake()->boolean(90),
        ];
    }
}
