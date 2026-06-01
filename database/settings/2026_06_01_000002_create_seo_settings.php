<?php

use App\Settings\SeoSettings;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        foreach (SeoSettings::defaults() as $name => $value) {
            $this->migrator->add("seo.{$name}", $value);
        }
    }

    public function down(): void
    {
        foreach (array_keys(SeoSettings::defaults()) as $name) {
            $this->migrator->deleteIfExists("seo.{$name}");
        }
    }
};
