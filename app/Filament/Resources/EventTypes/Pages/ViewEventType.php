<?php

namespace App\Filament\Resources\EventTypes\Pages;

use App\Filament\Resources\EventTypes\EventTypeResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewEventType extends CmsViewRecord
{
    protected static string $resource = EventTypeResource::class;
}
