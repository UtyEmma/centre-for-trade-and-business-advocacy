<?php

namespace App\Filament\Resources\JobPostings\RelationManagers;

use App\Filament\Resources\JobApplications\JobApplicationResource;
use App\Filament\Resources\JobApplications\Schemas\JobApplicationForm;
use App\Filament\Resources\JobApplications\Schemas\JobApplicationInfolist;
use App\Filament\Resources\JobApplications\Tables\JobApplicationsTable;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ApplicationsRelationManager extends RelationManager
{
    protected static string $relationship = 'applications';

    protected static ?string $relatedResource = JobApplicationResource::class;

    public function form(Schema $schema): Schema
    {
        return JobApplicationForm::configure($schema, includeJobPosting: false);
    }

    public function infolist(Schema $schema): Schema
    {
        return JobApplicationInfolist::configure($schema, includeJobPosting: false);
    }

    public function table(Table $table): Table
    {
        return JobApplicationsTable::configure($table, includeJobPosting: false)
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
