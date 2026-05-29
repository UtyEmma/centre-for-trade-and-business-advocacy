<?php

namespace App\Filament\Resources\ContactMessageResponses\Pages;

use App\Filament\Resources\ContactMessageResponses\ContactMessageResponseResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListContactMessageResponses extends CmsListRecords
{
    protected static string $resource = ContactMessageResponseResource::class;
}
