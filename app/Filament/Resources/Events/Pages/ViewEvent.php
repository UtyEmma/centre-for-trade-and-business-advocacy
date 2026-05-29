<?php

namespace App\Filament\Resources\Events\Pages;

use App\Filament\Resources\Events\EventResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewEvent extends CmsViewRecord
{
    protected static string $resource = EventResource::class;
}
