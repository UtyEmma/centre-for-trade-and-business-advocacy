<?php

namespace Database\Factories;

use App\Enums\CaseStudyStatus;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\CaseStudy>
 */
class CaseStudyFactory extends Factory
{
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-3 years', '-2 months');

        return [
            'service_id' => Service::factory(),
            'title' => fake()->unique()->sentence(5),
            'partner' => fake()->company(),
            'location' => fake()->city(),
            'summary' => fake()->sentence(18),
            'content' => fake()->paragraphs(5, true),
            'start_date' => $startDate,
            'end_date' => fake()->dateTimeBetween($startDate, 'now'),
            'status' => fake()->randomElement(CaseStudyStatus::cases())->value,
            'is_featured' => fake()->boolean(25),
            'is_published' => fake()->boolean(80),
        ];
    }
}
