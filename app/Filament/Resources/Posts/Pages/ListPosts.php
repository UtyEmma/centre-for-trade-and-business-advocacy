<?php

namespace App\Filament\Resources\Posts\Pages;

use App\Filament\Resources\Posts\PostResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListPosts extends CmsListRecords
{
    protected static string $resource = PostResource::class;
}
