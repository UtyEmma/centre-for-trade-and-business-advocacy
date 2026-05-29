<?php

namespace App\Filament\Resources\PostCategories\Pages;

use App\Filament\Resources\PostCategories\PostCategoryResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditPostCategory extends CmsEditRecord
{
    protected static string $resource = PostCategoryResource::class;
}
