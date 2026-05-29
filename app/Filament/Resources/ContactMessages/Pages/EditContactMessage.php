<?php

namespace App\Filament\Resources\ContactMessages\Pages;

use App\Filament\Resources\ContactMessages\ContactMessageResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditContactMessage extends CmsEditRecord
{
    protected static string $resource = ContactMessageResource::class;
}
