<?php

namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    public function definition(): array
    {
        $status = fake()->randomElement(PostStatus::cases());

        return [
            'post_category_id' => PostCategory::factory(),
            'user_id' => User::factory(),
            'title' => fake()->unique()->sentence(6),
            'excerpt' => fake()->sentence(20),
            'content' => fake()->paragraphs(6, true),
            'status' => $status->value,
            'published_at' => $status === PostStatus::Published ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'allow_comments' => fake()->boolean(80),
            'is_featured' => fake()->boolean(20),
        ];
    }
}
