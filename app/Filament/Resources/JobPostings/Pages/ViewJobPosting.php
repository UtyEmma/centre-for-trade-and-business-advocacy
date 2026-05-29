<?php

namespace App\Filament\Resources\JobPostings\Pages;

use App\Filament\Resources\JobPostings\JobPostingResource;
use App\Filament\Resources\Support\Pages\CmsViewRecord;

class ViewJobPosting extends CmsViewRecord
{
    protected static string $resource = JobPostingResource::class;
}
