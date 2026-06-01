<?php

namespace App\Support;

use App\Enums\JobPostingStatus;
use App\Models\CaseStudy;
use App\Models\Event;
use App\Models\Faq;
use App\Models\JobPosting;
use App\Models\PageSeo;
use App\Models\Post;
use App\Models\Publication;
use App\Models\PublicationType;
use App\Models\Service;
use App\Models\TeamMember;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Schema\BreadcrumbListSchema;
use RalphJSmit\Laravel\SEO\Schema\FaqPageSchema;
use RalphJSmit\Laravel\SEO\SchemaCollection;
use RalphJSmit\Laravel\SEO\Support\SEOData;

final class Seo
{
    public static function sourceForRequest(Request $request): Model|SEOData|null
    {
        if (! Schema::hasTable('seo')) {
            return null;
        }

        foreach ($request->route()?->parameters() ?? [] as $parameter) {
            if ($parameter instanceof Model && method_exists($parameter, 'seo')) {
                return $parameter;
            }
        }

        if (! Schema::hasTable('page_seos')) {
            return null;
        }

        $routeName = $request->route()?->getName();

        if (! $routeName) {
            return null;
        }

        return PageSeo::query()
            ->where('route_name', $routeName)
            ->where('is_active', true)
            ->first();
    }

    public static function page(PageSeo $page): SEOData
    {
        $title = $page->label;
        $siteSettings = Site::settings();
        $seoSettings = Site::seoSettings();
        $description = "Explore {$page->label} from ".Site::name($siteSettings).'.';
        $url = $page->publicUrl();
        $schema = self::schemaWithBreadcrumbs($title, $url, $page->route_name === 'home' ? [] : [
            'Home' => self::routeUrl('home'),
        ]);

        match ($page->route_name) {
            'home' => $schema
                ->add(fn (): array => self::cleanSchema([
                    '@context' => 'https://schema.org',
                    '@type' => 'WebSite',
                    'name' => Site::name(),
                    'url' => self::routeUrl('home'),
                ]))
                ->add(fn (): array => self::organization()),
            'faqs' => $schema->addFaqPage(function (FaqPageSchema $faqPage): FaqPageSchema {
                Faq::query()
                    ->published()
                    ->get()
                    ->each(fn (Faq $faq): FaqPageSchema => $faqPage->addQuestion(
                        name: self::text($faq->question, 240) ?? '',
                        acceptedAnswer: self::text($faq->answer, 2000) ?? '',
                    ));

                return $faqPage;
            }),
            default => $schema->add(fn () => self::pageSchema($page)),
        };

        return new SEOData(
            title: $title,
            description: $description,
            author: filled($seoSettings->site_author) ? $seoSettings->site_author : Site::name($siteSettings),
            image: Site::assetUrl($seoSettings->og_image, $siteSettings->site_logo),
            url: $url,
            schema: $schema,
            site_name: Site::name($siteSettings),
            favicon: Site::assetUrl($siteSettings->favicon, '/assets/img/logo/favicon.png'),
            type: 'website',
        );
    }

    public static function post(Post $post): SEOData
    {
        $url = self::routeUrl('blog.show', $post);
        $description = self::text($post->excerpt ?: $post->content);

        return new SEOData(
            title: $post->title,
            description: $description,
            author: $post->author?->name,
            image: self::nullable($post->image),
            url: $url,
            published_time: $post->published_at,
            modified_time: $post->updated_at,
            articleBody: self::text($post->content, 5000),
            section: $post->category?->name,
            tags: $post->tags->map(fn ($tag): string => (string) $tag->name)->all(),
            schema: self::schemaWithBreadcrumbs($post->title, $url, [
                'Home' => self::routeUrl('home'),
                'Blog' => self::routeUrl('blog'),
            ])->addArticle(),
            type: 'article',
        );
    }

    public static function service(Service $service): SEOData
    {
        $url = self::routeUrl('services.show', $service);
        $description = self::text($service->summary ?: $service->description);

        return new SEOData(
            title: $service->title,
            description: $description,
            image: self::nullable($service->getFirstMediaUrl('image')),
            url: $url,
            schema: self::schemaWithBreadcrumbs($service->title, $url, [
                'Home' => self::routeUrl('home'),
                'Services' => self::routeUrl('services'),
            ])->add(fn (SEOData $SEOData): array => self::cleanSchema([
                '@context' => 'https://schema.org',
                '@type' => 'Service',
                'name' => $SEOData->title,
                'description' => $SEOData->description,
                'url' => $SEOData->url,
                'image' => $SEOData->image,
                'provider' => self::organization(false),
            ])),
            type: 'website',
        );
    }

    public static function caseStudy(CaseStudy $caseStudy): SEOData
    {
        $url = self::routeUrl('case-studies.show', $caseStudy);
        $description = self::text($caseStudy->summary ?: $caseStudy->content);

        return new SEOData(
            title: $caseStudy->title,
            description: $description,
            image: self::nullable($caseStudy->image),
            url: $url,
            published_time: $caseStudy->start_date,
            modified_time: $caseStudy->updated_at,
            schema: self::schemaWithBreadcrumbs($caseStudy->title, $url, [
                'Home' => self::routeUrl('home'),
                'Case Studies' => self::routeUrl('case-studies'),
            ])->add(fn (SEOData $SEOData): array => self::cleanSchema([
                '@context' => 'https://schema.org',
                '@type' => 'CreativeWork',
                'name' => $SEOData->title,
                'description' => $SEOData->description,
                'url' => $SEOData->url,
                'image' => $SEOData->image,
                'dateCreated' => $caseStudy->start_date?->toDateString(),
                'dateModified' => $caseStudy->updated_at?->toIso8601String(),
                'about' => $caseStudy->service?->title,
                'locationCreated' => $caseStudy->location,
            ])),
            type: 'article',
        );
    }

    public static function event(Event $event): SEOData
    {
        $url = self::routeUrl('events.show', $event);
        $description = self::text($event->summary ?: $event->description);

        return new SEOData(
            title: $event->title,
            description: $description,
            image: self::nullable($event->image),
            url: $url,
            published_time: $event->start_at,
            modified_time: $event->updated_at,
            schema: self::schemaWithBreadcrumbs($event->title, $url, [
                'Home' => self::routeUrl('home'),
                'Events' => self::routeUrl('events'),
            ])->add(fn (SEOData $SEOData): array => self::cleanSchema([
                '@context' => 'https://schema.org',
                '@type' => 'Event',
                'name' => $SEOData->title,
                'description' => $SEOData->description,
                'url' => $SEOData->url,
                'image' => $SEOData->image,
                'startDate' => $event->start_at?->toIso8601String(),
                'endDate' => $event->end_at?->toIso8601String(),
                'eventAttendanceMode' => self::eventAttendanceMode($event),
                'eventStatus' => 'https://schema.org/EventScheduled',
                'location' => self::eventLocation($event),
                'organizer' => self::organization(false),
            ])),
            type: 'website',
        );
    }

    public static function teamMember(TeamMember $teamMember): SEOData
    {
        $url = self::routeUrl('teams.show', $teamMember);
        $description = self::text($teamMember->bio) ?? trim("{$teamMember->name}, {$teamMember->role}");

        return new SEOData(
            title: $teamMember->name,
            description: $description,
            image: self::nullable($teamMember->image),
            url: $url,
            schema: self::schemaWithBreadcrumbs($teamMember->name, $url, [
                'Home' => self::routeUrl('home'),
                'Team' => self::routeUrl('teams'),
            ])->add(fn (SEOData $SEOData): array => self::cleanSchema([
                '@context' => 'https://schema.org',
                '@type' => 'Person',
                'name' => $SEOData->title,
                'description' => $SEOData->description,
                'url' => $SEOData->url,
                'image' => $SEOData->image,
                'jobTitle' => $teamMember->role,
                'email' => $teamMember->email ? "mailto:{$teamMember->email}" : null,
                'sameAs' => $teamMember->linkedin_url ? [$teamMember->linkedin_url] : null,
                'worksFor' => self::organization(false),
            ])),
            type: 'profile',
        );
    }

    public static function jobPosting(JobPosting $jobPosting): SEOData
    {
        $url = self::routeUrl('careers.show', $jobPosting);
        $description = self::text($jobPosting->summary ?: $jobPosting->description);

        return new SEOData(
            title: $jobPosting->title,
            description: $description,
            url: $url,
            modified_time: $jobPosting->updated_at,
            schema: self::schemaWithBreadcrumbs($jobPosting->title, $url, [
                'Home' => self::routeUrl('home'),
                'Careers' => self::routeUrl('careers'),
            ])->add(fn (SEOData $SEOData): array => self::cleanSchema([
                '@context' => 'https://schema.org',
                '@type' => 'JobPosting',
                'title' => $SEOData->title,
                'description' => self::text(collect([
                    $jobPosting->description,
                    $jobPosting->responsibilities,
                    $jobPosting->requirements,
                    $jobPosting->benefits,
                ])->filter()->implode(' '), 5000) ?? $SEOData->description,
                'datePosted' => $jobPosting->created_at?->toDateString(),
                'validThrough' => $jobPosting->application_deadline?->toIso8601String(),
                'employmentType' => self::employmentType($jobPosting->employment_type),
                'hiringOrganization' => self::organization(false),
                'jobLocation' => $jobPosting->location ? [
                    '@type' => 'Place',
                    'address' => $jobPosting->location,
                ] : null,
                'applicantLocationRequirements' => $jobPosting->workplace_type === 'remote' ? [
                    '@type' => 'Country',
                    'name' => 'Remote',
                ] : null,
                'url' => $SEOData->url,
            ])),
            type: 'website',
            robots: ($jobPosting->is_published && $jobPosting->status === JobPostingStatus::Open) ? null : 'noindex, nofollow',
        );
    }

    public static function publicationType(PublicationType $publicationType): SEOData
    {
        $url = self::routeUrl('publications', $publicationType);
        $description = self::text($publicationType->description);

        return new SEOData(
            title: $publicationType->name,
            description: $description,
            url: $url,
            schema: self::schemaWithBreadcrumbs($publicationType->name, $url, [
                'Home' => self::routeUrl('home'),
            ])->add(fn (SEOData $SEOData): array => self::cleanSchema([
                '@context' => 'https://schema.org',
                '@type' => 'CollectionPage',
                'name' => $SEOData->title,
                'description' => $SEOData->description,
                'url' => $SEOData->url,
                'mainEntity' => [
                    '@type' => 'ItemList',
                    'itemListElement' => $publicationType->publications()
                        ->published()
                        ->limit(20)
                        ->get()
                        ->values()
                        ->map(fn (Publication $publication, int $index): array => self::cleanSchema([
                            '@type' => 'ListItem',
                            'position' => $index + 1,
                            'name' => $publication->title,
                            'url' => $publication->external_url ?: $publication->document,
                        ]))
                        ->all(),
                ],
            ])),
            type: 'website',
        );
    }

    public static function routeUrl(string $route, mixed $parameters = [], ?string $fallback = null): string
    {
        if (Route::has($route)) {
            return route($route, $parameters);
        }

        return url($fallback ?? '/');
    }

    public static function text(?string $value, int $limit = 160): ?string
    {
        $text = trim((string) preg_replace('/\s+/', ' ', html_entity_decode(strip_tags((string) $value))));

        if ($text === '') {
            return null;
        }

        return Str::limit($text, $limit, '');
    }

    public static function nullable(?string $value): ?string
    {
        return filled($value) ? $value : null;
    }

    protected static function schemaWithBreadcrumbs(string $title, string $url, array $prepend = []): SchemaCollection
    {
        return SchemaCollection::initialize()
            ->addBreadcrumbs(function (BreadcrumbListSchema $breadcrumbs) use ($prepend): BreadcrumbListSchema {
                return $prepend ? $breadcrumbs->prependBreadcrumbs($prepend) : $breadcrumbs;
            });
    }

    protected static function pageSchema(PageSeo $page): array
    {
        $type = match ($page->route_name) {
            'about' => 'AboutPage',
            'contact' => 'ContactPage',
            default => 'CollectionPage',
        };

        return self::cleanSchema([
            '@context' => 'https://schema.org',
            '@type' => $type,
            'name' => $page->label,
            'description' => "Explore {$page->label} from ".Site::name().'.',
            'url' => $page->publicUrl(),
            'isPartOf' => [
                '@type' => 'WebSite',
                'name' => Site::name(),
                'url' => self::routeUrl('home'),
            ],
        ]);
    }

    protected static function organization(bool $withContext = true): array
    {
        $siteSettings = Site::settings();

        return self::cleanSchema([
            ...($withContext ? ['@context' => 'https://schema.org'] : []),
            '@type' => 'Organization',
            'name' => Site::name($siteSettings),
            'url' => self::routeUrl('home'),
            'logo' => Site::assetUrl($siteSettings->site_logo, '/assets/img/logo/logo.png'),
            'email' => $siteSettings->email,
            'telephone' => $siteSettings->phone,
            'address' => $siteSettings->address,
            'sameAs' => Site::sameAs($siteSettings),
        ]);
    }

    protected static function eventAttendanceMode(Event $event): string
    {
        return match ($event->format) {
            'online' => 'https://schema.org/OnlineEventAttendanceMode',
            'hybrid' => 'https://schema.org/MixedEventAttendanceMode',
            default => 'https://schema.org/OfflineEventAttendanceMode',
        };
    }

    protected static function eventLocation(Event $event): ?array
    {
        if ($event->format === 'online') {
            return $event->online_url ? [
                '@type' => 'VirtualLocation',
                'url' => $event->online_url,
            ] : null;
        }

        return ($event->venue || $event->location) ? [
            '@type' => 'Place',
            'name' => $event->venue,
            'address' => $event->location,
        ] : null;
    }

    protected static function employmentType(?string $employmentType): ?string
    {
        return match ($employmentType) {
            'full_time' => 'FULL_TIME',
            'part_time' => 'PART_TIME',
            'contract' => 'CONTRACTOR',
            'internship' => 'INTERN',
            default => null,
        };
    }

    protected static function cleanSchema(array $schema): array
    {
        $isList = array_is_list($schema);
        $clean = [];

        foreach ($schema as $key => $value) {
            if (is_array($value)) {
                $value = self::cleanSchema($value);
            }

            if ($value === null || $value === '' || $value === []) {
                continue;
            }

            $clean[$key] = $value;
        }

        return $isList ? array_values($clean) : $clean;
    }
}
