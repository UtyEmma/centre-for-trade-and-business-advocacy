<?php

namespace Database\Factories;

use App\Enums\JobApplicationStatus;
use App\Models\JobApplication;
use App\Models\JobPosting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobApplication>
 */
class JobApplicationFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement(JobApplicationStatus::cases());
        $coverLetterPath = fake()->optional()->randomElement([
            'job-applications/demo/cover-letter.pdf',
        ]);

        return [
            'job_posting_id' => JobPosting::factory(),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'linkedin_url' => fake()->optional()->url(),
            'resume_path' => 'job-applications/demo/resume.pdf',
            'resume_original_name' => 'resume.pdf',
            'cover_letter_path' => $coverLetterPath,
            'cover_letter_original_name' => filled($coverLetterPath) ? 'cover-letter.pdf' : null,
            'status' => $status->value,
            'admin_notes' => fake()->optional()->paragraph(),
            'submitted_at' => fake()->dateTimeBetween('-3 months', 'now'),
            'reviewed_at' => in_array($status, [JobApplicationStatus::New, JobApplicationStatus::InReview], true)
                ? null
                : fake()->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
