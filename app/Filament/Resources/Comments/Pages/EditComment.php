<?php

namespace App\Filament\Resources\Comments\Pages;

use App\Filament\Resources\Comments\CommentResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditComment extends CmsEditRecord
{
    protected static string $resource = CommentResource::class;
}
