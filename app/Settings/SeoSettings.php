<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SeoSettings extends Settings
{
    public ?string $default_title = SiteSettings::DefaultSiteName;

    public ?string $title_suffix = ' | '.SiteSettings::DefaultSiteName;

    public ?string $homepage_title = SiteSettings::DefaultSiteName;

    public ?string $default_description = SiteSettings::DefaultFooterText;

    public ?string $site_author = SiteSettings::DefaultSiteName;

    public string $robots = 'max-snippet:-1,max-image-preview:large,max-video-preview:-1';

    public ?string $sitemap = null;

    public ?string $twitter_username = null;

    public ?string $og_image = '/assets/img/logo/logo.png';

    public ?string $og_title = null;

    public static function group(): string
    {
        return 'seo';
    }

    /**
     * @return array{default_title: string, title_suffix: string, homepage_title: string, default_description: string, site_author: string, robots: string, sitemap: null, twitter_username: null, og_image: string, og_title: null}
     */
    public static function defaults(): array
    {
        return [
            'default_title' => SiteSettings::DefaultSiteName,
            'title_suffix' => ' | '.SiteSettings::DefaultSiteName,
            'homepage_title' => SiteSettings::DefaultSiteName,
            'default_description' => SiteSettings::DefaultFooterText,
            'site_author' => SiteSettings::DefaultSiteName,
            'robots' => 'max-snippet:-1,max-image-preview:large,max-video-preview:-1',
            'sitemap' => null,
            'twitter_username' => null,
            'og_image' => '/assets/img/logo/logo.png',
            'og_title' => null,
        ];
    }
}
