<?php

namespace Database\Seeders;

use App\Models\CaseStudy;
use App\Models\Event;
use App\Models\JobPosting;
use App\Models\PageSeo;
use App\Models\Post;
use App\Models\PublicationType;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    public function run(): void
    {
        $pageSeo = $this->pageSeo();

        collect(PageSeo::defaultPages())
            ->each(function (array $page, string $routeName): void {
                PageSeo::query()->updateOrCreate(
                    ['route_name' => $routeName],
                    [
                        'label' => $page['label'],
                        'path' => $page['path'],
                        'sort_order' => array_search($routeName, array_keys(PageSeo::defaultPages()), true) + 1,
                        'is_active' => true,
                    ],
                );
            });

        collect([
            PageSeo::class,
            Post::class,
            Service::class,
            CaseStudy::class,
            Event::class,
            TeamMember::class,
            JobPosting::class,
            PublicationType::class,
        ])->each(function (string $modelClass) use ($pageSeo): void {
            $modelClass::query()
                ->withoutGlobalScopes()
                ->lazyById()
                ->each(function (Model $model) use ($pageSeo): void {
                    if (! method_exists($model, 'seo') || $model->seo()->exists()) {
                        if (method_exists($model, 'seo')) {
                            $this->seedSeoMetadata($model, $pageSeo);
                        }

                        return;
                    }

                    $this->seedSeoMetadata($model, $pageSeo);
                });
        });
    }

    /**
     * @param  array<string, array{title: string, description: string}>  $pageSeo
     */
    protected function seedSeoMetadata(Model $model, array $pageSeo): void
    {
        $seoData = match (true) {
            $model instanceof PageSeo => $pageSeo[$model->route_name] ?? null,
            $model instanceof Service => [
                'title' => $model->title,
                'description' => $this->plain($model->summary ?: $model->description),
            ],
            $model instanceof PublicationType => [
                'title' => $model->name,
                'description' => $this->plain($model->description),
            ],
            default => null,
        };

        if ($seoData === null) {
            if (! $model->seo()->exists()) {
                $model->seo()->create();
            }

            return;
        }

        $model->seo()->updateOrCreate([], [
            'title' => $seoData['title'],
            'description' => $seoData['description'],
            'author' => 'Centre for Trade and Business Environment Advocacy',
        ]);
    }

    /**
     * @return array<string, array{title: string, description: string}>
     */
    protected function pageSeo(): array
    {
        return [
            'home' => [
                'title' => 'Centre for Trade and Business Environment Advocacy',
                'description' => 'An independent Nigerian non-profit policy, research, and advocacy organisation promoting equitable markets for sustainable development across trade, competition, digital governance, sustainability, and accountability.',
            ],
            'about' => [
                'title' => 'Who We Are',
                'description' => 'Learn about the Centre for Trade and Business Environment Advocacy, its institutional profile, mission, vision, governance structure, and public-interest approach to market reform.',
            ],
            'services' => [
                'title' => 'What We Do',
                'description' => 'Explore the five programme areas of the Centre for Trade and Business Environment Advocacy across trade, competition, digital economy, sustainability, and public-sector accountability.',
            ],
            'case-studies' => [
                'title' => 'Case Studies',
                'description' => 'Representative engagements showing how the Centre for Trade and Business Environment Advocacy moves from research and diagnosis to stakeholder mobilisation, policy dialogue, and reform pathway-shaping.',
            ],
            'faqs' => [
                'title' => 'Frequently Asked Questions',
                'description' => 'Answers to common questions about the Centre for Trade and Business Environment Advocacy, its mission, programme areas, approach, publications, partnerships, and contact details.',
            ],
            'blog' => [
                'title' => 'Our Blog',
                'description' => 'Policy and regulatory commentary from the Centre for Trade and Business Environment Advocacy across trade, competition, consumer protection, digital governance, sustainability, and accountability.',
            ],
            'contact' => [
                'title' => 'Contact Us',
                'description' => 'Contact the Centre for Trade and Business Environment Advocacy for policy, research, development partner, civil society, private sector, and public enquiries.',
            ],
        ];
    }

    protected function plain(?string $value): string
    {
        return trim((string) preg_replace('/\s+/', ' ', strip_tags((string) $value)));
    }
}
