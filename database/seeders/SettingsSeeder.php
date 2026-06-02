<?php

namespace Database\Seeders;

use App\Settings\MailSettings;
use App\Settings\NewsletterSettings;
use App\Settings\SeoSettings;
use App\Settings\SiteSettings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\LaravelSettings\Settings;
use Spatie\LaravelSettings\Support\Crypto;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        if (! Schema::hasTable($this->settingsTable())) {
            return;
        }

        $this->seedGroup(SiteSettings::class, SiteSettings::defaults());
        $this->seedGroup(SeoSettings::class, SeoSettings::defaults());
        $this->seedGroup(MailSettings::class, MailSettings::defaults());
        $this->seedGroup(NewsletterSettings::class, NewsletterSettings::defaults());
    }

    /**
     * @param  class-string<Settings>  $settingsClass
     * @param  array<string, mixed>  $settings
     */
    protected function seedGroup(string $settingsClass, array $settings): void
    {
        $table = $this->settingsTable();
        $group = $settingsClass::group();
        $encrypted = $settingsClass::encrypted();

        foreach ($settings as $name => $payload) {
            $exists = DB::table($table)
                ->where('group', $group)
                ->where('name', $name)
                ->exists();

            if ($exists) {
                continue;
            }

            DB::table($table)->insert([
                'group' => $group,
                'name' => $name,
                'locked' => false,
                'payload' => json_encode(in_array($name, $encrypted, true) ? Crypto::encrypt($payload) : $payload, JSON_THROW_ON_ERROR),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function settingsTable(): string
    {
        return (string) (config('settings.repositories.database.table') ?? 'settings');
    }
}
