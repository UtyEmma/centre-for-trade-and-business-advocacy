<?php

namespace App\Filament\Resources\Comments\Pages;

use App\Filament\Resources\Comments\CommentResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewComment extends CmsViewRecord
{
    protected static string $resource = CommentResource::class;
}
