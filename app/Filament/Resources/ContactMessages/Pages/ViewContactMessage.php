<?php

namespace App\Filament\Resources\ContactMessages\Pages;

use App\Filament\Resources\ContactMessages\ContactMessageResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewContactMessage extends CmsViewRecord
{
    protected static string $resource = ContactMessageResource::class;
}
