<?php

namespace App\Filament\Resources\Publications;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\Publications\Pages\CreatePublication;
use App\Filament\Resources\Publications\Pages\EditPublication;
use App\Filament\Resources\Publications\Pages\ListPublications;
use App\Filament\Resources\Publications\Pages\ViewPublication;
use App\Filament\Resources\Publications\Schemas\PublicationForm;
use App\Filament\Resources\Publications\Schemas\PublicationInfolist;
use App\Filament\Resources\Publications\Tables\PublicationsTable;
use App\Filament\Resources\Support\Concerns\HasSoftDeleteResourceBinding;
use App\Models\Publication;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PublicationResource extends Resource
{
    use HasSoftDeleteResourceBinding;

    protected static ?string $model = Publication::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = NavigationGroups::PUBLICATIONS_AND_EVENTS;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return PublicationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PublicationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PublicationsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPublications::route('/'),
            'create' => CreatePublication::route('/create'),
            'view' => ViewPublication::route('/{record}'),
            'edit' => EditPublication::route('/{record}/edit'),
        ];
    }
}
