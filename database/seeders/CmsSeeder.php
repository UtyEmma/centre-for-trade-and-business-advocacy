<?php

namespace Database\Seeders;

use App\Enums\ContactMessageResponseStatus;
use App\Enums\ContactMessageStatus;
use App\Enums\PostStatus;
use App\Models\CaseStudy;
use App\Models\Comment;
use App\Models\ContactMessage;
use App\Models\ContactMessageResponse;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\EventType;
use App\Models\Faq;
use App\Models\Partner;
use App\Models\PartnerType;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Publication;
use App\Models\PublicationType;
use App\Models\Service;
use App\Models\TeamCategory;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    public function run(): void
    {
        $demoUser = User::query()
            ->where('email', 'test@example.com')
            ->firstOrFail();

        $services = collect([
            'Policy Advisory',
            'Capacity Building',
            'Research and Insights',
            'Stakeholder Engagement',
            'Digital Transformation',
        ])->values()->map(fn (string $title, int $index): Service => Service::query()->firstOrCreate(
            ['title' => $title],
            [
                'icon' => 'heroicon-o-sparkles',
                'summary' => fake()->sentence(16),
                'description' => fake()->paragraphs(3, true),
                'sort_order' => $index + 1,
                'is_featured' => $index < 2,
                'is_published' => true,
            ],
        ));

        $postCategories = collect(['News', 'Insights', 'Stories', 'Updates'])
            ->values()
            ->map(fn (string $name, int $index): PostCategory => PostCategory::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => fake()->sentence(18),
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ],
            ));

        $publicationTypes = collect(['Reports', 'Briefings', 'Guides', 'Policy Papers'])
            ->values()
            ->map(fn (string $name, int $index): PublicationType => PublicationType::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => fake()->sentence(18),
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ],
            ));

        $eventTypes = collect(['Workshops', 'Webinars', 'Conferences', 'Roundtables'])
            ->values()
            ->map(fn (string $name, int $index): EventType => EventType::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => fake()->sentence(18),
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ],
            ));

        $teamCategories = collect(['Leadership', 'Program Team', 'Advisors'])
            ->values()
            ->map(fn (string $name, int $index): TeamCategory => TeamCategory::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => fake()->sentence(18),
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ],
            ));

        $partnerTypes = collect(['Government', 'Development Partners', 'Private Sector', 'Civil Society'])
            ->values()
            ->map(fn (string $name, int $index): PartnerType => PartnerType::query()->firstOrCreate(
                ['name' => $name],
                [
                    'description' => fake()->sentence(18),
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ],
            ));

        if (CaseStudy::query()->doesntExist()) {
            $services->each(fn (Service $service): mixed => CaseStudy::factory()
                ->count(2)
                ->create(['service_id' => $service->getKey()]));
        }

        if (Faq::query()->doesntExist()) {
            Faq::factory()
                ->count(12)
                ->create();
        }

        if (Testimonial::query()->doesntExist()) {
            Testimonial::factory()
                ->count(8)
                ->create();
        }

        $posts = Post::query()->exists()
            ? Post::query()->latest()->limit(12)->get()
            : collect(range(1, 12))
                ->map(function () use ($demoUser, $postCategories): Post {
                    $post = Post::factory()->create([
                        'post_category_id' => $postCategories->random()->getKey(),
                        'user_id' => $demoUser->getKey(),
                        'status' => PostStatus::Published->value,
                        'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
                    ]);

                    $post->syncTags(fake()->randomElements([
                        'community',
                        'policy',
                        'research',
                        'events',
                        'capacity',
                        'partnerships',
                    ], fake()->numberBetween(2, 4)));

                    return $post;
                });

        if (Comment::query()->doesntExist()) {
            $posts->each(fn (Post $post): mixed => Comment::factory()
                ->count(2)
                ->create([
                    'commentable_type' => Post::class,
                    'commentable_id' => $post->getKey(),
                    'user_id' => fake()->boolean() ? $demoUser->getKey() : null,
                ]));
        }

        if (Publication::query()->doesntExist()) {
            collect(range(1, 8))->each(fn (): Publication => Publication::factory()->create([
                'publication_type_id' => $publicationTypes->random()->getKey(),
                'service_id' => $services->random()->getKey(),
            ]));
        }

        $events = Event::query()->exists()
            ? Event::query()->latest()->limit(6)->get()
            : collect(range(1, 6))
                ->map(fn (): Event => Event::factory()->create([
                    'event_type_id' => $eventTypes->random()->getKey(),
                    'service_id' => $services->random()->getKey(),
                ]));

        if (EventRegistration::query()->doesntExist()) {
            $events->each(fn (Event $event): mixed => EventRegistration::factory()
                ->count(fake()->numberBetween(2, 6))
                ->create(['event_id' => $event->getKey()]));
        }

        if (TeamMember::query()->doesntExist()) {
            $teamCategories->each(fn (TeamCategory $teamCategory): mixed => TeamMember::factory()
                ->count(3)
                ->create(['team_category_id' => $teamCategory->getKey()]));
        }

        $this->call(JobPostingSeeder::class);

        if (Partner::query()->doesntExist()) {
            $partnerTypes->each(fn (PartnerType $partnerType): mixed => Partner::factory()
                ->count(3)
                ->create(['partner_type_id' => $partnerType->getKey()]));
        }

        if (ContactMessage::query()->exists()) {
            return;
        }

        $messages = ContactMessage::factory()
            ->count(8)
            ->create();

        $messages->take(3)->each(function (ContactMessage $message) use ($demoUser): void {
            $sentAt = fake()->dateTimeBetween('-2 months', 'now');

            ContactMessageResponse::factory()->create([
                'contact_message_id' => $message->getKey(),
                'user_id' => $demoUser->getKey(),
                'subject' => 'Re: ' . $message->subject,
                'status' => ContactMessageResponseStatus::Sent->value,
                'sent_at' => $sentAt,
            ]);

            $message->forceFill([
                'status' => ContactMessageStatus::Responded,
                'responded_at' => $sentAt,
            ])->save();
        });

        $messages->skip(3)->take(2)->each(fn (ContactMessage $message): ContactMessageResponse => ContactMessageResponse::factory()->create([
            'contact_message_id' => $message->getKey(),
            'user_id' => $demoUser->getKey(),
            'subject' => 'Re: ' . $message->subject,
            'status' => ContactMessageResponseStatus::Draft->value,
            'sent_at' => null,
        ]));
    }
}
