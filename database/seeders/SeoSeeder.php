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
        collect(PageSeo::defaultPages())
            ->each(function (array $page, string $routeName): void {
                PageSeo::query()->firstOrCreate(
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
        ])->each(function (string $modelClass): void {
            $modelClass::query()
                ->withoutGlobalScopes()
                ->lazyById()
                ->each(function (Model $model): void {
                    if (! method_exists($model, 'seo') || $model->seo()->exists()) {
                        return;
                    }

                    $model->seo()->create();
                });
        });
    }
}
