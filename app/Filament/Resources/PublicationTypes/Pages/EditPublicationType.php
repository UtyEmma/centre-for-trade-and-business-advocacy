<?php

namespace App\Filament\Resources\PublicationTypes\Pages;

use App\Filament\Resources\PublicationTypes\PublicationTypeResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditPublicationType extends CmsEditRecord
{
    protected static string $resource = PublicationTypeResource::class;
}
