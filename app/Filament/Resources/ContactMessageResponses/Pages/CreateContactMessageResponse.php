<?php

namespace App\Filament\Resources\ContactMessageResponses\Pages;

use App\Filament\Resources\ContactMessageResponses\ContactMessageResponseResource;
use Filament\Resources\Pages\CreateRecord;

class CreateContactMessageResponse extends CreateRecord
{
    protected static string $resource = ContactMessageResponseResource::class;
}
