<?php

namespace App\Filament\Resources\CaseStudies;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\CaseStudies\Pages\CreateCaseStudy;
use App\Filament\Resources\CaseStudies\Pages\EditCaseStudy;
use App\Filament\Resources\CaseStudies\Pages\ListCaseStudies;
use App\Filament\Resources\CaseStudies\Pages\ViewCaseStudy;
use App\Filament\Resources\CaseStudies\Schemas\CaseStudyForm;
use App\Filament\Resources\CaseStudies\Schemas\CaseStudyInfolist;
use App\Filament\Resources\CaseStudies\Tables\CaseStudiesTable;
use App\Filament\Resources\Support\Concerns\HasSoftDeleteResourceBinding;
use App\Models\CaseStudy;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class CaseStudyResource extends Resource
{
    use HasSoftDeleteResourceBinding;

    protected static ?string $model = CaseStudy::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = NavigationGroups::CMS;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return CaseStudyForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return CaseStudyInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CaseStudiesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCaseStudies::route('/'),
            'create' => CreateCaseStudy::route('/create'),
            'view' => ViewCaseStudy::route('/{record}'),
            'edit' => EditCaseStudy::route('/{record}/edit'),
        ];
    }
}
