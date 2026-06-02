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
            $existing = DB::table($table)
                ->where('group', $group)
                ->where('name', $name)
                ->first(['payload']);

            if ($existing !== null) {
                if ($this->shouldRefreshDefault($group, $name, $existing->payload)) {
                    DB::table($table)
                        ->where('group', $group)
                        ->where('name', $name)
                        ->update([
                            'payload' => $this->payloadFor($payload, in_array($name, $encrypted, true)),
                            'updated_at' => now(),
                        ]);
                }

                continue;
            }

            DB::table($table)->insert([
                'group' => $group,
                'name' => $name,
                'locked' => false,
                'payload' => $this->payloadFor($payload, in_array($name, $encrypted, true)),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    protected function payloadFor(mixed $payload, bool $encrypted): string
    {
        return json_encode($encrypted ? Crypto::encrypt($payload) : $payload, JSON_THROW_ON_ERROR);
    }

    protected function shouldRefreshDefault(string $group, string $name, string $payload): bool
    {
        $refreshableDefaults = [
            'site' => [
                'tagline' => ['Promoting equitable markets for sustainable development.'],
                'email' => [null],
                'phone' => [null],
                'address' => [null],
                'footer_text' => [
                    'The Centre for Trade and Business Environment Advocacy is an independent Nigerian non-profit policy, research, and advocacy organisation promoting equitable markets for sustainable development.',
                ],
            ],
            'seo' => [
                'title_suffix' => [
                    ' | '.SiteSettings::DefaultSiteName,
                ],
                'default_description' => [
                    'The Centre for Trade and Business Environment Advocacy is an independent Nigerian non-profit policy, research, and advocacy organisation promoting equitable markets for sustainable development.',
                ],
            ],
            'mail' => [
                'from_address' => ['hello@example.com'],
            ],
        ];

        if (! array_key_exists($name, $refreshableDefaults[$group] ?? [])) {
            return false;
        }

        return in_array(json_decode($payload, true, flags: JSON_THROW_ON_ERROR), $refreshableDefaults[$group][$name], true);
    }

    protected function settingsTable(): string
    {
        return (string) (config('settings.repositories.database.table') ?? 'settings');
    }
}
