<?php

namespace App\Filament\Resources\Comments\Pages;

use App\Filament\Resources\Comments\CommentResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListComments extends CmsListRecords
{
    protected static string $resource = CommentResource::class;
}
