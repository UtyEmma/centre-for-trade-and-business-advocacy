<?php

namespace App\Filament\Resources\EventTypes;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\EventTypes\Pages\CreateEventType;
use App\Filament\Resources\EventTypes\Pages\EditEventType;
use App\Filament\Resources\EventTypes\Pages\ListEventTypes;
use App\Filament\Resources\EventTypes\Pages\ViewEventType;
use App\Filament\Resources\EventTypes\Schemas\EventTypeForm;
use App\Filament\Resources\EventTypes\Schemas\EventTypeInfolist;
use App\Filament\Resources\EventTypes\Tables\EventTypesTable;
use App\Models\EventType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EventTypeResource extends Resource
{
    protected static ?string $model = EventType::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = NavigationGroups::PUBLICATIONS_AND_EVENTS;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return EventTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EventTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventTypesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEventTypes::route('/'),
            'create' => CreateEventType::route('/create'),
            'view' => ViewEventType::route('/{record}'),
            'edit' => EditEventType::route('/{record}/edit'),
        ];
    }
}
