<?php

namespace Database\Factories;

use App\Enums\ContactMessageResponseStatus;
use App\Models\ContactMessage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\ContactMessageResponse>
 */
class ContactMessageResponseFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement(ContactMessageResponseStatus::cases());

        return [
            'contact_message_id' => ContactMessage::factory(),
            'user_id' => User::factory(),
            'subject' => 'Re: ' . fake()->sentence(5),
            'response' => fake()->paragraphs(3, true),
            'status' => $status->value,
            'sent_at' => $status === ContactMessageResponseStatus::Sent ? fake()->dateTimeBetween('-2 months', 'now') : null,
        ];
    }
}
