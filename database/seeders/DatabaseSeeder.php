<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->firstOrCreate(
            ['email' => 'test@'.env('APP_DOMAIN')],
            [
                'name' => 'Test User',
                'email_verified_at' => now(),
                'password' => Hash::make('1234567890'),
            ],
        );

        $this->call([
            CmsSeeder::class,
            SettingsSeeder::class,
            SeoSeeder::class,
        ]);
    }
}
