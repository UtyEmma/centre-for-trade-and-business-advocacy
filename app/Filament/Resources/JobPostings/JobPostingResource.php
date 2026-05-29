<?php

namespace App\Filament\Resources\JobPostings;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\JobPostings\Pages\CreateJobPosting;
use App\Filament\Resources\JobPostings\Pages\EditJobPosting;
use App\Filament\Resources\JobPostings\Pages\ListJobPostings;
use App\Filament\Resources\JobPostings\Pages\ViewJobPosting;
use App\Filament\Resources\JobPostings\RelationManagers\ApplicationsRelationManager;
use App\Filament\Resources\JobPostings\Schemas\JobPostingForm;
use App\Filament\Resources\JobPostings\Schemas\JobPostingInfolist;
use App\Filament\Resources\JobPostings\Tables\JobPostingsTable;
use App\Filament\Resources\Support\Concerns\HasSoftDeleteResourceBinding;
use App\Models\JobPosting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class JobPostingResource extends Resource
{
    use HasSoftDeleteResourceBinding;

    protected static ?string $model = JobPosting::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = NavigationGroups::PEOPLE_AND_PARTNERS;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return JobPostingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return JobPostingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return JobPostingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            ApplicationsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListJobPostings::route('/'),
            'create' => CreateJobPosting::route('/create'),
            'view' => ViewJobPosting::route('/{record}'),
            'edit' => EditJobPosting::route('/{record}/edit'),
        ];
    }
}
