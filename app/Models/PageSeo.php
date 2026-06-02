<?php

namespace App\Models;

use App\Support\Seo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;

#[Fillable([
    'route_name',
    'label',
    'path',
    'sort_order',
    'is_active',
])]
class PageSeo extends Model
{
    use HasSEO;

    protected $attributes = [
        'sort_order' => 0,
        'is_active' => true,
    ];

    public static function defaultPages(): array
    {
        return [
            'home' => ['label' => 'Home', 'path' => '/'],
            'about' => ['label' => 'About', 'path' => '/about'],
            'contact' => ['label' => 'Contact', 'path' => '/contact'],
            'faqs' => ['label' => 'Frequently Asked Questions', 'path' => '/frequently-asked-questions'],
            'services' => ['label' => 'Services', 'path' => '/services'],
            'careers' => ['label' => 'Careers', 'path' => '/careers'],
            'case-studies' => ['label' => 'Case Studies', 'path' => '/case-studies'],
            'teams' => ['label' => 'Team', 'path' => '/team'],
            'gallery' => ['label' => 'Gallery', 'path' => '/gallery'],
            'blog' => ['label' => 'Blog', 'path' => '/blog'],
            'events' => ['label' => 'Events', 'path' => '/events'],
        ];
    }

    public static function routeOptions(): array
    {
        return collect(self::defaultPages())
            ->mapWithKeys(fn (array $page, string $routeName): array => [$routeName => $page['label']])
            ->all();
    }

    public function getDynamicSEOData(): SEOData
    {
        return Seo::page($this);
    }

    public function publicUrl(): string
    {
        return Seo::routeUrl($this->route_name, fallback: $this->path ?: '/');
    }

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ];
    }
}
