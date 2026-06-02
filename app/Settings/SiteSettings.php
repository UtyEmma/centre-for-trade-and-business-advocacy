<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public const string DefaultSiteName = 'Centre for Trade and Business Environment Advocacy';

    public const string DefaultTagline = 'Promoting equitable markets for sustainable development';

    public const string DefaultFooterText = 'The Centre for Trade and Business Environment Advocacy is an independent Nigerian non-profit policy, research, and advocacy organisation working across trade, competition, consumer protection, digital governance, sustainability, and public-sector accountability in Nigeria and across Africa.';

    public const string DefaultEmail = 'info@centre-tba.org';

    public const string DefaultPhone = '+234 812 631 7786';

    public const string DefaultAddress = 'No. 46, Agadez Crescent, Wuse 2, Abuja-FCT, Nigeria';

    public string $site_name = self::DefaultSiteName;

    public ?string $tagline = self::DefaultTagline;

    public ?string $email = self::DefaultEmail;

    public ?string $phone = self::DefaultPhone;

    public ?string $address = self::DefaultAddress;

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
     * @return array{site_name: string, tagline: string, email: string, phone: string, address: string, footer_text: string, copyright_text: string, header_scripts: null, footer_scripts: null, site_logo: string, footer_logo: string, favicon: string, social_profiles: array<int, array{provider?: string, url?: string}>}
     */
    public static function defaults(): array
    {
        return [
            'site_name' => self::DefaultSiteName,
            'tagline' => self::DefaultTagline,
            'email' => self::DefaultEmail,
            'phone' => self::DefaultPhone,
            'address' => self::DefaultAddress,
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
