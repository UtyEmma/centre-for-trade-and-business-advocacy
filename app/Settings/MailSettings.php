<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class MailSettings extends Settings
{
    public string $mailer = 'log';

    public string $from_name = 'Centre for Trade and Business Environment Advocacy';

    public string $from_address = SiteSettings::DefaultEmail;

    public ?string $reply_to_name = null;

    public ?string $reply_to_address = null;

    public string $smtp_host = '127.0.0.1';

    public int $smtp_port = 2525;

    public ?string $smtp_scheme = null;

    public ?string $smtp_username = null;

    public ?string $smtp_password = null;

    public static function group(): string
    {
        return 'mail';
    }

    public static function encrypted(): array
    {
        return [
            'smtp_password',
        ];
    }

    public static function defaults(): array
    {
        return [
            'mailer' => in_array(config('mail.default'), ['smtp', 'log'], true) ? config('mail.default') : 'log',
            'from_name' => config('mail.from.name') ?: SiteSettings::DefaultSiteName,
            'from_address' => in_array(config('mail.from.address'), [null, '', 'hello@example.com'], true)
                ? SiteSettings::DefaultEmail
                : config('mail.from.address'),
            'reply_to_name' => config('mail.reply_to.name'),
            'reply_to_address' => config('mail.reply_to.address'),
            'smtp_host' => config('mail.mailers.smtp.host') ?: '127.0.0.1',
            'smtp_port' => (int) (config('mail.mailers.smtp.port') ?: 2525),
            'smtp_scheme' => config('mail.mailers.smtp.scheme'),
            'smtp_username' => config('mail.mailers.smtp.username'),
            'smtp_password' => config('mail.mailers.smtp.password'),
        ];
    }
}
