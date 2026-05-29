<?php

namespace Database\Factories;

use App\Enums\EventRegistrationStatus;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\EventRegistration>
 */
class EventRegistrationFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement(EventRegistrationStatus::cases());

        return [
            'event_id' => Event::factory(),
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'organization' => fake()->optional()->company(),
            'role' => fake()->optional()->jobTitle(),
            'notes' => fake()->optional()->paragraph(),
            'status' => $status->value,
            'registered_at' => fake()->dateTimeBetween('-6 months', 'now'),
            'responded_at' => in_array($status, [EventRegistrationStatus::Confirmed, EventRegistrationStatus::Cancelled], true)
                ? fake()->dateTimeBetween('-5 months', 'now')
                : null,
        ];
    }
}
