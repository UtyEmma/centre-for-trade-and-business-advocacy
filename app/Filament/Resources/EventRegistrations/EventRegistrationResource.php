<?php

namespace App\Filament\Resources\EventRegistrations;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\EventRegistrations\Pages\CreateEventRegistration;
use App\Filament\Resources\EventRegistrations\Pages\EditEventRegistration;
use App\Filament\Resources\EventRegistrations\Pages\ListEventRegistrations;
use App\Filament\Resources\EventRegistrations\Pages\ViewEventRegistration;
use App\Filament\Resources\EventRegistrations\Schemas\EventRegistrationForm;
use App\Filament\Resources\EventRegistrations\Schemas\EventRegistrationInfolist;
use App\Filament\Resources\EventRegistrations\Tables\EventRegistrationsTable;
use App\Filament\Resources\Support\Concerns\HasSoftDeleteResourceBinding;
use App\Models\EventRegistration;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class EventRegistrationResource extends Resource
{
    use HasSoftDeleteResourceBinding;

    protected static ?string $model = EventRegistration::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static string | UnitEnum | null $navigationGroup = NavigationGroups::PUBLICATIONS_AND_EVENTS;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return EventRegistrationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return EventRegistrationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EventRegistrationsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEventRegistrations::route('/'),
            'create' => CreateEventRegistration::route('/create'),
            'view' => ViewEventRegistration::route('/{record}'),
            'edit' => EditEventRegistration::route('/{record}/edit'),
        ];
    }
}
