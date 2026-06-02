<?php

namespace App\Filament\Pages;

use App\Filament\Navigation\NavigationGroups;
use App\Settings\SeoSettings;
use BackedEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SettingsPage;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class ManageSeoSettings extends SettingsPage
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMagnifyingGlass;

    protected static string|UnitEnum|null $navigationGroup = NavigationGroups::SETTINGS;

    protected static ?string $navigationLabel = 'SEO Settings';

    protected static ?int $navigationSort = 101;

    protected static ?string $title = 'SEO Settings';

    protected static string $settings = SeoSettings::class;

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Defaults')
                    ->schema([
                        TextInput::make('default_title')
                            ->label('Default title')
                            ->maxLength(255),
                        TextInput::make('homepage_title')
                            ->label('Homepage title')
                            ->maxLength(255),
                        TextInput::make('title_suffix')
                            ->helperText('Appended to generated page titles.')
                            ->maxLength(255),
                        Textarea::make('default_description')
                            ->label('Default description')
                            ->rows(4)
                            ->columnSpanFull(),
                        TextInput::make('site_author')
                            ->label('Site author')
                            ->maxLength(255),
                        Select::make('robots')
                            ->options([
                                'max-snippet:-1,max-image-preview:large,max-video-preview:-1' => 'Default search preview',
                                'index, follow' => 'Index, Follow',
                                'index, nofollow' => 'Index, Nofollow',
                                'noindex, follow' => 'Noindex, Follow',
                                'noindex, nofollow' => 'Noindex, Nofollow',
                            ])
                            ->native(false)
                            ->required(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Sharing')
                    ->schema([
                        FileUpload::make('og_image')
                            ->label('OG image')
                            ->disk('public')
                            ->directory('seo')
                            ->visibility('public')
                            ->image()
                            ->imageEditor()
                            ->maxSize(4096),
                        TextInput::make('og_title')
                            ->label('OG title fallback')
                            ->maxLength(255),
                        TextInput::make('twitter_username')
                            ->label('Twitter / X username')
                            ->prefix('@')
                            ->maxLength(255),
                        TextInput::make('sitemap')
                            ->helperText('Use a root-relative path like /sitemap.xml or an absolute URL.')
                            ->maxLength(2048),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
