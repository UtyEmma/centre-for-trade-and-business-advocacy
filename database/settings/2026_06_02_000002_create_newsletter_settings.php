<?php

use App\Settings\NewsletterSettings;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        foreach (NewsletterSettings::defaults() as $name => $value) {
            $this->migrator->add("newsletter.{$name}", $value);
        }
    }

    public function down(): void
    {
        foreach (array_keys(NewsletterSettings::defaults()) as $name) {
            $this->migrator->deleteIfExists("newsletter.{$name}");
        }
    }
};
