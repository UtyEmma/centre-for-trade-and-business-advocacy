<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditPost extends CmsEditRecord
{
    protected static string $resource = PostResource::class;
}
