<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditEvent extends CmsEditRecord
{
    protected static string $resource = EventResource::class;
}
