<?php

namespace App\Support;

use App\Models\NewsletterSubscriber;
use App\Settings\NewsletterSettings;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Throwable;

final class Newsletter
{
    public static function settings(): NewsletterSettings
    {
        if (! self::hasSettingsTable()) {
            return new NewsletterSettings(NewsletterSettings::defaults());
        }

        try {
            return app(NewsletterSettings::class);
        } catch (Throwable) {
            return new NewsletterSettings(NewsletterSettings::defaults());
        }
    }

    public static function confirmationUrl(NewsletterSubscriber $subscriber): string
    {
        return URL::temporarySignedRoute(
            'newsletter.confirm',
            now()->addDays(7),
            ['subscriber' => $subscriber],
        );
    }

    public static function unsubscribeUrl(NewsletterSubscriber $subscriber): string
    {
        return URL::signedRoute('newsletter.unsubscribe', [
            'subscriber' => $subscriber,
        ]);
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
