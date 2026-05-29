<?php

namespace App\Filament\Resources\JobPostings\Pages;

use App\Filament\Resources\JobPostings\JobPostingResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListJobPostings extends CmsListRecords
{
    protected static string $resource = JobPostingResource::class;
}
