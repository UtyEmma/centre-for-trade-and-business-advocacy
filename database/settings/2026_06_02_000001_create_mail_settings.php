<?php

use App\Settings\MailSettings;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        foreach (MailSettings::defaults() as $name => $value) {
            $this->migrator->add("mail.{$name}", $value, in_array($name, MailSettings::encrypted(), true));
        }
    }

    public function down(): void
    {
        foreach (array_keys(MailSettings::defaults()) as $name) {
            $this->migrator->deleteIfExists("mail.{$name}");
        }
    }
};
