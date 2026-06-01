<?php

namespace App\Enums;

enum SocialProvider: string
{
    case Facebook = 'facebook';
    case X = 'x';
    case Twitter = 'twitter';
    case Instagram = 'instagram';
    case Linkedin = 'linkedin';
    case Youtube = 'youtube';
    case Telegram = 'telegram';
    case Whatsapp = 'whatsapp';
    case Tiktok = 'tiktok';
    case Threads = 'threads';
    case Github = 'github';
    case Behance = 'behance';
    case Dribbble = 'dribbble';

    public function label(): string
    {
        return match ($this) {
            self::Facebook => 'Facebook',
            self::X => 'X',
            self::Twitter => 'Twitter',
            self::Instagram => 'Instagram',
            self::Linkedin => 'LinkedIn',
            self::Youtube => 'YouTube',
            self::Telegram => 'Telegram',
            self::Whatsapp => 'WhatsApp',
            self::Tiktok => 'TikTok',
            self::Threads => 'Threads',
            self::Github => 'GitHub',
            self::Behance => 'Behance',
            self::Dribbble => 'Dribbble',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::Facebook => 'phosphor-facebook-logo',
            self::X => 'phosphor-x-logo',
            self::Twitter => 'phosphor-twitter-logo',
            self::Instagram => 'phosphor-instagram-logo',
            self::Linkedin => 'phosphor-linkedin-logo',
            self::Youtube => 'phosphor-youtube-logo',
            self::Telegram => 'phosphor-telegram-logo',
            self::Whatsapp => 'phosphor-whatsapp-logo',
            self::Tiktok => 'phosphor-tiktok-logo',
            self::Threads => 'phosphor-threads-logo',
            self::Github => 'phosphor-github-logo',
            self::Behance => 'phosphor-behance-logo',
            self::Dribbble => 'phosphor-dribbble-logo',
        };
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return collect(self::cases())
            ->mapWithKeys(fn (self $provider): array => [$provider->value => $provider->label()])
            ->all();
    }
}
