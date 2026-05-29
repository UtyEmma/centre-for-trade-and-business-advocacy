<?php

namespace Database\Factories;

use App\Enums\ContactMessageStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\ContactMessage>
 */
class ContactMessageFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement(ContactMessageStatus::cases());

        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'organization' => fake()->optional()->company(),
            'subject' => fake()->sentence(6),
            'message' => fake()->paragraphs(3, true),
            'status' => $status->value,
            'admin_notes' => fake()->optional()->paragraph(),
            'responded_at' => $status === ContactMessageStatus::Responded ? fake()->dateTimeBetween('-3 months', 'now') : null,
        ];
    }
}
