<?php

namespace Database\Factories;

use App\Enums\EventStatus;
use App\Models\Event;
use App\Models\EventType;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    public function definition(): array
    {
        $startAt = fake()->dateTimeBetween('-2 months', '+8 months');
        $registrationDeadline = (clone $startAt)->modify('-'.fake()->numberBetween(1, 30).' days');

        return [
            'event_type_id' => EventType::factory(),
            'service_id' => fake()->boolean(70) ? Service::factory() : null,
            'title' => fake()->unique()->sentence(5),
            'summary' => fake()->sentence(18),
            'description' => fake()->paragraphs(4, true),
            'format' => fake()->randomElement(['in_person', 'online', 'hybrid']),
            'venue' => fake()->optional()->company(),
            'location' => fake()->optional()->city(),
            'online_url' => fake()->optional()->url(),
            'start_at' => $startAt,
            'end_at' => fake()->dateTimeBetween($startAt, '+9 months'),
            'registration_deadline' => $registrationDeadline,
            'external_registration_url' => fake()->optional()->url(),
            'registrations_enabled' => true,
            'capacity' => fake()->optional()->numberBetween(25, 300),
            'status' => fake()->randomElement(EventStatus::cases())->value,
            'sort_order' => fake()->numberBetween(1, 50),
            'is_featured' => fake()->boolean(25),
            'is_published' => fake()->boolean(80),
        ];
    }
}
