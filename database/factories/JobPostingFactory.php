<?php

namespace Database\Factories;

use App\Enums\JobPostingStatus;
use App\Models\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobPosting>
 */
class JobPostingFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement(JobPostingStatus::cases());

        return [
            'title' => fake()->unique()->jobTitle(),
            'department' => fake()->randomElement([
                'Programs',
                'Operations',
                'Research',
                'Partnerships',
                'Finance',
            ]),
            'location' => fake()->randomElement([
                'Abuja',
                'Lagos',
                'Remote',
                'Hybrid',
            ]),
            'employment_type' => fake()->randomElement([
                'full_time',
                'part_time',
                'contract',
                'internship',
            ]),
            'workplace_type' => fake()->randomElement([
                'onsite',
                'remote',
                'hybrid',
            ]),
            'summary' => fake()->sentence(18),
            'description' => fake()->paragraphs(3, true),
            'responsibilities' => fake()->paragraphs(3, true),
            'requirements' => fake()->paragraphs(3, true),
            'benefits' => fake()->paragraphs(2, true),
            'salary_range' => fake()->optional()->randomElement([
                'Competitive',
                'NGN 350,000 - NGN 550,000 monthly',
                'NGN 600,000 - NGN 900,000 monthly',
            ]),
            'application_url' => fake()->optional()->url(),
            'application_email' => fake()->safeEmail(),
            'application_deadline' => fake()->optional()->dateTimeBetween('now', '+6 months'),
            'status' => $status->value,
            'sort_order' => fake()->numberBetween(1, 50),
            'is_featured' => fake()->boolean(25),
            'is_published' => fake()->boolean(80),
        ];
    }
}
