<?php

namespace App\Filament\Resources\PartnerTypes;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\PartnerTypes\Pages\CreatePartnerType;
use App\Filament\Resources\PartnerTypes\Pages\EditPartnerType;
use App\Filament\Resources\PartnerTypes\Pages\ListPartnerTypes;
use App\Filament\Resources\PartnerTypes\Pages\ViewPartnerType;
use App\Filament\Resources\PartnerTypes\Schemas\PartnerTypeForm;
use App\Filament\Resources\PartnerTypes\Schemas\PartnerTypeInfolist;
use App\Filament\Resources\PartnerTypes\Tables\PartnerTypesTable;
use App\Models\PartnerType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PartnerTypeResource extends Resource
{
    protected static ?string $model = PartnerType::class;

    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedTag;

    protected static string | UnitEnum | null $navigationGroup = NavigationGroups::PEOPLE_AND_PARTNERS;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return PartnerTypeForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PartnerTypeInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PartnerTypesTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPartnerTypes::route('/'),
            'create' => CreatePartnerType::route('/create'),
            'view' => ViewPartnerType::route('/{record}'),
            'edit' => EditPartnerType::route('/{record}/edit'),
        ];
    }
}
