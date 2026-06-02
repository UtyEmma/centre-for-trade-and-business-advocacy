<?php

namespace App\Support;

use App\Settings\MailSettings;
use Illuminate\Support\Facades\Schema;
use Throwable;

final class MailConfiguration
{
    public static function configure(): void
    {
        $settings = self::settings();
        $mailer = in_array($settings->mailer, ['smtp', 'log'], true) ? $settings->mailer : 'log';

        config()->set([
            'mail.default' => $mailer,
            'mail.from.address' => self::value($settings->from_address) ?? config('mail.from.address'),
            'mail.from.name' => self::value($settings->from_name) ?? config('mail.from.name'),
            'mail.reply_to.address' => self::value($settings->reply_to_address),
            'mail.reply_to.name' => self::value($settings->reply_to_name),
            'mail.mailers.smtp.host' => self::value($settings->smtp_host) ?? '127.0.0.1',
            'mail.mailers.smtp.port' => $settings->smtp_port ?: 2525,
            'mail.mailers.smtp.scheme' => self::value($settings->smtp_scheme),
            'mail.mailers.smtp.username' => self::value($settings->smtp_username),
            'mail.mailers.smtp.password' => self::value($settings->smtp_password),
        ]);

        if (app()->bound('mail.manager')) {
            app('mail.manager')->forgetMailers();
        }
    }

    public static function settings(): MailSettings
    {
        if (! self::hasSettingsTable()) {
            return new MailSettings(MailSettings::defaults());
        }

        try {
            return app(MailSettings::class);
        } catch (Throwable) {
            return new MailSettings(MailSettings::defaults());
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

    protected static function value(mixed $value): ?string
    {
        if (! is_scalar($value) && $value !== null) {
            return null;
        }

        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }
}
