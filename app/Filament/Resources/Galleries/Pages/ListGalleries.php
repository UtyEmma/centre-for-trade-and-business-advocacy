<?php

namespace App\Filament\Resources\Galleries\Pages;

use App\Filament\Resources\Galleries\GalleryResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListGalleries extends CmsListRecords
{
    protected static string $resource = GalleryResource::class;
}
