<?php

namespace App\Filament\Resources\PublicationTypes\Pages;

use App\Filament\Resources\PublicationTypes\PublicationTypeResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListPublicationTypes extends CmsListRecords
{
    protected static string $resource = PublicationTypeResource::class;
}
