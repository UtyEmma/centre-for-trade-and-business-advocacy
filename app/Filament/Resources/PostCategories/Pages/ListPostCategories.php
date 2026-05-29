<?php

namespace App\Filament\Resources\PostCategories\Pages;

use App\Filament\Resources\PostCategories\PostCategoryResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListPostCategories extends CmsListRecords
{
    protected static string $resource = PostCategoryResource::class;
}
