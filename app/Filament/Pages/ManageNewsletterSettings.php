<?php

namespace App\Filament\Pages;

use App\Filament\Navigation\NavigationGroups;
use App\Settings\NewsletterSettings;
use App\Support\NewsletterContent;
use BackedEnum;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageNewsletterSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedNewspaper;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::EMAIL_MARKETING;

    protected static ?string $navigationLabel = 'Newsletter Settings';

    protected static ?int $navigationSort = 101;

    protected static ?string $title = 'Newsletter Settings';

    protected static string $settings = NewsletterSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Subscription')
                    ->schema([
                        Toggle::make('double_opt_in_enabled')
                            ->label('Require double opt-in')
                            ->helperText('When enabled, subscribers must confirm by email before becoming active.'),
                        Textarea::make('signup_success_message')
                            ->required()
                            ->rows(2),
                        Textarea::make('already_subscribed_message')
                            ->required()
                            ->rows(2),
                        Textarea::make('confirmation_sent_message')
                            ->required()
                            ->rows(2),
                        Textarea::make('confirmation_success_message')
                            ->required()
                            ->rows(2),
                        Textarea::make('unsubscribe_success_message')
                            ->required()
                            ->rows(2),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Confirmation Email')
                    ->schema([
                        TextInput::make('confirmation_email_subject')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Variables: '.NewsletterContent::Variables),
                        RichEditor::make('confirmation_email_body')
                            ->required()
                            ->helperText('Variables: '.NewsletterContent::Variables)
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(1),
                Section::make('Campaign Footer')
                    ->schema([
                        RichEditor::make('campaign_footer')
                            ->required()
                            ->helperText('Variables: '.NewsletterContent::Variables)
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(1),
            ]);
    }
}
