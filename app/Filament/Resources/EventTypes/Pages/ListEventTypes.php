<?php

namespace App\Filament\Resources\EventTypes\Pages;

use App\Filament\Resources\EventTypes\EventTypeResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListEventTypes extends CmsListRecords
{
    protected static string $resource = EventTypeResource::class;
}
