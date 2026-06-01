<?php

use App\Settings\SiteSettings;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        foreach (SiteSettings::defaults() as $name => $value) {
            $this->migrator->add("site.{$name}", $value);
        }
    }

    public function down(): void
    {
        foreach (array_keys(SiteSettings::defaults()) as $name) {
            $this->migrator->deleteIfExists("site.{$name}");
        }
    }
};
