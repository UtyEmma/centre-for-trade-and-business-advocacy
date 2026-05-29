<?php

namespace App\Filament\Resources\JobApplications\Tables;

use App\Enums\JobApplicationStatus;
use App\Filament\Resources\JobApplications\Actions\DownloadJobApplicationFileAction;
use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Filament\Resources\Support\DateRangeFilter;
use App\Models\JobApplication;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class JobApplicationsTable
{
    public static function configure(Table $table, bool $includeJobPosting = true): Table
    {
        return CmsTable::withSoftDeletes($table
            ->defaultSort('submitted_at', 'desc')
            ->columns([
                ...($includeJobPosting ? [
                    TextColumn::make('jobPosting.title')
                        ->label('Job posting')
                        ->searchable()
                        ->sortable(),
                ] : []),
                TextColumn::make('applicant_name')
                    ->label('Applicant')
                    ->state(fn (JobApplication $record): string => $record->applicant_name)
                    ->searchable(['first_name', 'last_name'])
                    ->sortable(['first_name', 'last_name']),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('submitted_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('reviewed_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
            ])
            ->filters([
                ...($includeJobPosting ? [
                    SelectFilter::make('job_posting_id')
                        ->label('Job posting')
                        ->relationship('jobPosting', 'title')
                        ->searchable()
                        ->preload(),
                ] : []),
                SelectFilter::make('status')
                    ->options(JobApplicationStatus::class),
                DateRangeFilter::make('submitted_at', 'Submitted date'),
                DateRangeFilter::make('reviewed_at', 'Reviewed date'),
                TrashedFilter::make(),
            ])
            ->recordActions([
                DownloadJobApplicationFileAction::make('download_resume', 'resume_path', 'resume_original_name', 'Resume'),
                DownloadJobApplicationFileAction::make('download_cover_letter', 'cover_letter_path', 'cover_letter_original_name', 'Cover letter'),
                ...CmsTableActions::record(),
            ])
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
