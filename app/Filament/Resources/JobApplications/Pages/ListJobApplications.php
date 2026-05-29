<?php

namespace App\Filament\Resources\JobApplications\Pages;

use App\Filament\Resources\JobApplications\JobApplicationResource;
use App\Filament\Resources\Support\Pages\CmsListRecords;

class ListJobApplications extends CmsListRecords
{
    protected static string $resource = JobApplicationResource::class;
}
