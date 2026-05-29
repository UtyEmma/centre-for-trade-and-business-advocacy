<?php

namespace App\Filament\Resources\EventRegistrations\Pages;

use App\Filament\Resources\EventRegistrations\EventRegistrationResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListEventRegistrations extends CmsListRecords
{
    protected static string $resource = EventRegistrationResource::class;
}
