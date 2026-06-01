<?php

namespace Database\Seeders;

use App\Settings\SeoSettings;
use App\Settings\SiteSettings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        if (! Schema::hasTable($this->settingsTable())) {
            return;
        }

        $this->seedGroup(SiteSettings::group(), SiteSettings::defaults());
        $this->seedGroup(SeoSettings::group(), SeoSettings::defaults());
    }

    /**
     * @param  array<string, mixed>  $settings
     */
    protected function seedGroup(string $group, array $settings): void
    {
        $table = $this->settingsTable();

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
                'payload' => json_encode($payload, JSON_THROW_ON_ERROR),
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
