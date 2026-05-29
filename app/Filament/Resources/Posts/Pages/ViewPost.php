<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewPost extends CmsViewRecord
{
    protected static string $resource = PostResource::class;
}
