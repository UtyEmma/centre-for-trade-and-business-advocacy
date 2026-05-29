<?php

namespace App\Filament\Resources\ContactMessageResponses\Pages;

use App\Filament\Resources\ContactMessageResponses\ContactMessageResponseResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditContactMessageResponse extends CmsEditRecord
{
    protected static string $resource = ContactMessageResponseResource::class;
}
