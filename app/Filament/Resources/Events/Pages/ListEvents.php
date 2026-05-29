<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListEvents extends CmsListRecords
{
    protected static string $resource = EventResource::class;
}
