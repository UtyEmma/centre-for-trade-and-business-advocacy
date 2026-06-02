<?php

namespace App\Filament\Resources\NewsletterCampaigns;

use App\Filament\Navigation\NavigationGroups;
use App\Filament\Resources\NewsletterCampaigns\Pages\CreateNewsletterCampaign;
use App\Filament\Resources\NewsletterCampaigns\Pages\EditNewsletterCampaign;
use App\Filament\Resources\NewsletterCampaigns\Pages\ListNewsletterCampaigns;
use App\Filament\Resources\NewsletterCampaigns\Pages\ViewNewsletterCampaign;
use App\Filament\Resources\NewsletterCampaigns\RelationManagers\RecipientsRelationManager;
use App\Filament\Resources\NewsletterCampaigns\Schemas\NewsletterCampaignForm;
use App\Filament\Resources\NewsletterCampaigns\Schemas\NewsletterCampaignInfolist;
use App\Filament\Resources\NewsletterCampaigns\Tables\NewsletterCampaignsTable;
use App\Models\NewsletterCampaign;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class NewsletterCampaignResource extends Resource
{
    protected static ?string $model = NewsletterCampaign::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMegaphone;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::EMAIL_MARKETING;

    protected static ?string $recordTitleAttribute = 'subject';

    protected static ?string $navigationLabel = 'Campaigns';

    protected static ?string $modelLabel = 'newsletter campaign';

    protected static ?string $pluralModelLabel = 'newsletter campaigns';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return NewsletterCampaignForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return NewsletterCampaignInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NewsletterCampaignsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RecipientsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNewsletterCampaigns::route('/'),
            'create' => CreateNewsletterCampaign::route('/create'),
            'view' => ViewNewsletterCampaign::route('/{record}'),
            'edit' => EditNewsletterCampaign::route('/{record}/edit'),
        ];
    }
}
