<?php

namespace App\Support;

use App\Enums\SocialProvider;
use App\Settings\SeoSettings;
use App\Settings\SiteSettings;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\LaravelSettings\Settings;
use Throwable;

final class Site
{
    public static function settings(): SiteSettings
    {
        /** @var SiteSettings $settings */
        $settings = self::resolve(SiteSettings::class, SiteSettings::defaults());

        return $settings;
    }

    public static function seoSettings(): SeoSettings
    {
        /** @var SeoSettings $settings */
        $settings = self::resolve(SeoSettings::class, SeoSettings::defaults());

        return $settings;
    }

    public static function configureSeo(): void
    {
        $siteSettings = self::settings();
        $seoSettings = self::seoSettings();
        $siteLogoUrl = self::assetUrl($siteSettings->site_logo, '/assets/img/logo/logo.png');
        $ogImageUrl = self::assetUrl($seoSettings->og_image, $siteLogoUrl);

        config()->set([
            'seo.site_name' => self::value($siteSettings->site_name) ?? config('app.name'),
            'seo.sitemap' => self::value($seoSettings->sitemap),
            'seo.favicon' => self::assetUrl($siteSettings->favicon, '/assets/img/logo/favicon.png'),
            'seo.title.suffix' => $seoSettings->title_suffix ?? (' - '.self::name($siteSettings)),
            'seo.title.homepage_title' => null,
            'seo.description.fallback' => self::value($seoSettings->default_description) ?? self::value($siteSettings->tagline),
            'seo.image.fallback' => $ogImageUrl,
            'seo.author.fallback' => self::value($seoSettings->site_author) ?? self::name($siteSettings),
            'seo.twitter.@username' => self::value($seoSettings->twitter_username),
            'seo.robots.default' => self::value($seoSettings->robots) ?? 'max-snippet:-1,max-image-preview:large,max-video-preview:-1',
        ]);
    }

    public static function fallbackSEOData(): SEOData
    {
        $siteSettings = self::settings();
        $seoSettings = self::seoSettings();

        return new SEOData(
            title: self::value($seoSettings->homepage_title) ?? self::value($seoSettings->default_title) ?? self::name($siteSettings),
            description: self::value($seoSettings->default_description) ?? self::value($siteSettings->tagline),
            author: self::value($seoSettings->site_author) ?? self::name($siteSettings),
            image: self::assetUrl($seoSettings->og_image, $siteSettings->site_logo),
            url: url()->current(),
            twitter_username: self::value($seoSettings->twitter_username),
            type: 'website',
            site_name: self::name($siteSettings),
            favicon: self::assetUrl($siteSettings->favicon, '/assets/img/logo/favicon.png'),
            robots: self::value($seoSettings->robots),
            openGraphTitle: self::value($seoSettings->og_title),
        );
    }

    public static function name(?SiteSettings $settings = null): string
    {
        $settings ??= self::settings();

        return self::value($settings->site_name) ?? SiteSettings::DefaultSiteName;
    }

    public static function assetUrl(?string $path, ?string $fallback = null): ?string
    {
        $path = self::value($path) ?? self::value($fallback);

        if ($path === null) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        if (Str::startsWith($path, '/')) {
            return asset(ltrim($path, '/'));
        }

        if (Str::startsWith($path, 'assets/')) {
            return asset($path);
        }

        return Storage::disk('public')->url($path);
    }

    /**
     * @return array<int, array{provider: string, label: string, icon: string, url: string}>
     */
    public static function socialProfiles(?SiteSettings $settings = null): array
    {
        $settings ??= self::settings();

        return collect($settings->social_profiles)
            ->filter(fn (mixed $profile): bool => is_array($profile))
            ->map(function (array $profile): ?array {
                $provider = SocialProvider::tryFrom((string) ($profile['provider'] ?? ''));
                $url = self::safeUrl($profile['url'] ?? null);

                if (! $provider || ! $url) {
                    return null;
                }

                return [
                    'provider' => $provider->value,
                    'label' => $provider->label(),
                    'icon' => $provider->icon(),
                    'url' => $url,
                ];
            })
            ->filter()
            ->values()
            ->all();
    }

    /**
     * @return array<int, string>
     */
    public static function sameAs(?SiteSettings $settings = null): array
    {
        return collect(self::socialProfiles($settings))
            ->pluck('url')
            ->all();
    }

    public static function copyright(?SiteSettings $settings = null): string
    {
        $settings ??= self::settings();
        $text = self::value($settings->copyright_text) ?? SiteSettings::defaults()['copyright_text'];

        return strtr($text, [
            '{year}' => now()->format('Y'),
            '{site_name}' => self::name($settings),
        ]);
    }

    public static function emailHref(?SiteSettings $settings = null): ?string
    {
        $email = self::value(($settings ?? self::settings())->email);

        return $email && filter_var($email, FILTER_VALIDATE_EMAIL) ? "mailto:{$email}" : null;
    }

    public static function phoneHref(?SiteSettings $settings = null): ?string
    {
        $phone = self::value(($settings ?? self::settings())->phone);

        if ($phone === null) {
            return null;
        }

        $number = preg_replace('/[^0-9+]/', '', $phone);

        return $number ? "tel:{$number}" : null;
    }

    public static function safeUrl(mixed $url): ?string
    {
        $url = self::value($url);

        if ($url === null) {
            return null;
        }

        $scheme = parse_url($url, PHP_URL_SCHEME);

        return in_array(strtolower((string) $scheme), ['http', 'https'], true) ? $url : null;
    }

    protected static function value(mixed $value): ?string
    {
        if (! is_scalar($value) && $value !== null) {
            return null;
        }

        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }

    /**
     * @param  class-string<Settings>  $settingsClass
     * @param  array<string, mixed>  $defaults
     */
    protected static function resolve(string $settingsClass, array $defaults): Settings
    {
        if (! self::hasSettingsTable()) {
            return new $settingsClass($defaults);
        }

        try {
            return app($settingsClass);
        } catch (Throwable) {
            return new $settingsClass($defaults);
        }
    }

    protected static function hasSettingsTable(): bool
    {
        try {
            return Schema::hasTable((string) (config('settings.repositories.database.table') ?? 'settings'));
        } catch (Throwable) {
            return false;
        }
    }
}
