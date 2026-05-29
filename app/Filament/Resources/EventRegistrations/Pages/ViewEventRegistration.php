<?php

namespace App\Filament\Resources\EventRegistrations\Pages;

use App\Filament\Resources\EventRegistrations\EventRegistrationResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewEventRegistration extends CmsViewRecord
{
    protected static string $resource = EventRegistrationResource::class;
}
