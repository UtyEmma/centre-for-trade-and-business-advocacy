<?php

namespace App\Filament\Resources\Galleries\Pages;

use App\Filament\Resources\Galleries\GalleryResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditGallery extends CmsEditRecord
{
    protected static string $resource = GalleryResource::class;
}
