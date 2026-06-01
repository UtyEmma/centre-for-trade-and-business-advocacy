<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public const string DefaultSiteName = 'Centre for Trade and Business Environment Advocacy';

    public const string DefaultTagline = 'Promoting equitable markets for sustainable development.';

    public const string DefaultFooterText = 'The Centre for Trade and Business Environment Advocacy is an independent Nigerian non-profit policy, research, and advocacy organisation promoting equitable markets for sustainable development.';

    public string $site_name = self::DefaultSiteName;

    public ?string $tagline = self::DefaultTagline;

    public ?string $email = null;

    public ?string $phone = null;

    public ?string $address = null;

    public ?string $footer_text = self::DefaultFooterText;

    public string $copyright_text = "\u{00A9} {year} {site_name}. All Rights Reserved.";

    public ?string $header_scripts = null;

    public ?string $footer_scripts = null;

    public ?string $site_logo = '/assets/img/logo/logo.png';

    public ?string $footer_logo = '/assets/img/logo/citrus-logo-white.png';

    public ?string $favicon = '/assets/img/logo/favicon.png';

    public array $social_profiles = [];

    public static function group(): string
    {
        return 'site';
    }

    /**
     * @return array{site_name: string, tagline: string, email: null, phone: null, address: null, footer_text: string, copyright_text: string, header_scripts: null, footer_scripts: null, site_logo: string, footer_logo: string, favicon: string, social_profiles: array<int, array{provider?: string, url?: string}>}
     */
    public static function defaults(): array
    {
        return [
            'site_name' => self::DefaultSiteName,
            'tagline' => self::DefaultTagline,
            'email' => null,
            'phone' => null,
            'address' => null,
            'footer_text' => self::DefaultFooterText,
            'copyright_text' => "\u{00A9} {year} {site_name}. All Rights Reserved.",
            'header_scripts' => null,
            'footer_scripts' => null,
            'site_logo' => '/assets/img/logo/logo.png',
            'footer_logo' => '/assets/img/logo/citrus-logo-white.png',
            'favicon' => '/assets/img/logo/favicon.png',
            'social_profiles' => [],
        ];
    }
}
