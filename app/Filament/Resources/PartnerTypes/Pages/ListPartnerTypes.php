<?php

namespace App\Filament\Resources\PartnerTypes\Pages;

use App\Filament\Resources\PartnerTypes\PartnerTypeResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListPartnerTypes extends CmsListRecords
{
    protected static string $resource = PartnerTypeResource::class;
}
