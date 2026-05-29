<?php

namespace App\Filament\Resources\ContactMessages\Pages;

use App\Filament\Resources\ContactMessages\ContactMessageResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListContactMessages extends CmsListRecords
{
    protected static string $resource = ContactMessageResource::class;
}
