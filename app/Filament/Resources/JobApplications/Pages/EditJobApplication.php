<?php

namespace App\Filament\Resources\JobApplications\Pages;

use App\Filament\Resources\JobApplications\Actions\DownloadJobApplicationFileAction;
use App\Filament\Resources\JobApplications\JobApplicationResource;
use App\Filament\Resources\Support\Pages\CmsEditRecord;

class EditJobApplication extends CmsEditRecord
{
    protected static string $resource = JobApplicationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DownloadJobApplicationFileAction::make('download_resume', 'resume_path', 'resume_original_name', 'Resume'),
            DownloadJobApplicationFileAction::make('download_cover_letter', 'cover_letter_path', 'cover_letter_original_name', 'Cover letter'),
            ...parent::getHeaderActions(),
        ];
    }
}
