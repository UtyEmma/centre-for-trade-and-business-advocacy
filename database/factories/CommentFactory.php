<?php

namespace Database\Factories;

use App\Enums\CommentStatus;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement(CommentStatus::cases());

        return [
            'commentable_type' => Post::class,
            'commentable_id' => Post::factory(),
            'comment_id' => null,
            'user_id' => fake()->boolean(35) ? User::factory() : null,
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'website_url' => fake()->optional()->url(),
            'comment' => fake()->paragraph(),
            'status' => $status->value,
            'approved_at' => $status === CommentStatus::Approved ? fake()->dateTimeBetween('-6 months', 'now') : null,
        ];
    }
}
