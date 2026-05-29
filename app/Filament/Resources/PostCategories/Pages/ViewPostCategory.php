<?php

namespace App\Filament\Resources\PostCategories\Pages;

use App\Filament\Resources\PostCategories\PostCategoryResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewPostCategory extends CmsViewRecord
{
    protected static string $resource = PostCategoryResource::class;
}
