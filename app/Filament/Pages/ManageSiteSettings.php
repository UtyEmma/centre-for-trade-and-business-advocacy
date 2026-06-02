<?php

namespace App\Filament\Pages;

use App\Enums\SocialProvider;
use App\Filament\Navigation\NavigationGroups;
use App\Settings\SiteSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageSiteSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::SETTINGS;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?int $navigationSort = 100;

    protected static ?string $title = 'Site Settings';

    protected static string $settings = SiteSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Brand')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Site name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('tagline')
                            ->maxLength(255),
                        FileUpload::make('site_logo')
                            ->label('Site logo')
                            ->disk('public')
                            ->directory('site')
                            ->visibility('public')
                            ->image()
                            ->imageEditor()
                            ->maxSize(2048),
                        FileUpload::make('footer_logo')
                            ->label('Footer logo')
                            ->disk('public')
                            ->directory('site')
                            ->visibility('public')
                            ->image()
                            ->imageEditor()
                            ->maxSize(2048),
                        FileUpload::make('favicon')
                            ->disk('public')
                            ->directory('site')
                            ->visibility('public')
                            ->acceptedFileTypes([
                                'image/png',
                                'image/svg+xml',
                                'image/jpeg',
                                'image/gif',
                                'image/x-icon',
                                'image/vnd.microsoft.icon',
                            ])
                            ->maxSize(512),
                        Textarea::make('footer_text')
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('copyright_text')
                            ->required()
                            ->helperText('Supports {year} and {site_name}.')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Contact')
                    ->schema([
                        TextInput::make('email')
                            ->email()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        Textarea::make('address')
                            ->rows(4),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
                Section::make('Social profiles')
                    ->schema([
                        Repeater::make('social_profiles')
                            ->label('Profiles')
                            ->schema([
                                Select::make('provider')
                                    ->options(SocialProvider::options())
                                    ->searchable()
                                    ->native(false)
                                    ->required(),
                                TextInput::make('url')
                                    ->label('Profile URL')
                                    ->url()
                                    ->required()
                                    ->maxLength(2048),
                            ])
                            ->columns(2)
                            ->addActionLabel('Add social profile')
                            ->defaultItems(0)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Scripts')
                    ->schema([
                        Textarea::make('header_scripts')
                            ->label('Header scripts')
                            ->rows(8)
                            ->columnSpanFull()
                            ->helperText('Trusted snippets rendered before the closing head tag.'),
                        Textarea::make('footer_scripts')
                            ->label('Footer scripts')
                            ->rows(8)
                            ->columnSpanFull()
                            ->helperText('Trusted snippets rendered before the closing body tag.'),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
            ]);
    }
}
