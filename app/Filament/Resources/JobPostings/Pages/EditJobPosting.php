<?php

namespace App\Filament\Resources\JobPostings\Pages;

use App\Filament\Resources\JobPostings\JobPostingResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditJobPosting extends CmsEditRecord
{
    protected static string $resource = JobPostingResource::class;
}
