<?php

namespace App\Filament\Resources\TeamCategories\Pages;

use App\Filament\Resources\Support\Pages\CmsListRecords;
use App\Filament\Resources\TeamCategories\TeamCategoryResource;

class ListTeamCategories extends CmsListRecords
{
    protected static string $resource = TeamCategoryResource::class;
}
