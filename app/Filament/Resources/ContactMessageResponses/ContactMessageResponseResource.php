<?php

namespace App\Filament\Resources\ContactMessageResponses;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\ContactMessageResponses\Pages\CreateContactMessageResponse;
use App\Filament\Resources\ContactMessageResponses\Pages\EditContactMessageResponse;
use App\Filament\Resources\ContactMessageResponses\Pages\ListContactMessageResponses;
use App\Filament\Resources\ContactMessageResponses\Pages\ViewContactMessageResponse;
use App\Filament\Resources\ContactMessageResponses\Schemas\ContactMessageResponseForm;
use App\Filament\Resources\ContactMessageResponses\Schemas\ContactMessageResponseInfolist;
use App\Filament\Resources\ContactMessageResponses\Tables\ContactMessageResponsesTable;
use App\Filament\Resources\Support\Concerns\HasSoftDeleteResourceBinding;
use App\Models\ContactMessageResponse;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ContactMessageResponseResource extends Resource
{
    use HasSoftDeleteResourceBinding;

    protected static ?string $model = ContactMessageResponse::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedChatBubbleBottomCenterText;

    protected static string | UnitEnum | null $navigationGroup = NavigationGroups::ENQUIRIES;

    protected static ?string $recordTitleAttribute = 'subject';

    public static function form(Schema $schema): Schema
    {
        return ContactMessageResponseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ContactMessageResponseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ContactMessageResponsesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContactMessageResponses::route('/'),
            'create' => CreateContactMessageResponse::route('/create'),
            'view' => ViewContactMessageResponse::route('/{record}'),
            'edit' => EditContactMessageResponse::route('/{record}/edit'),
        ];
    }
}
