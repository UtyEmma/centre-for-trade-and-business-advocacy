<?php

namespace App\Filament\Resources\PageSeos\Schemas;

use App\Filament\Resources\Support\CmsForm;
use App\Models\PageSeo;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

final class PageSeoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Page')
                    ->schema([
                        Select::make('route_name')
                            ->label('Route')
                            ->options(PageSeo::routeOptions())
                            ->searchable()
                            ->native(false)
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->live()
                            ->afterStateUpdated(function (Set $set, ?string $state): void {
                                $page = PageSeo::defaultPages()[$state] ?? null;

                                if (! $page) {
                                    return;
                                }

                                $set('label', $page['label']);
                                $set('path', $page['path']);
                            }),
                        TextInput::make('label')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('path')
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        TextInput::make('sort_order')
                            ->numeric()
                            ->integer()
                            ->default(0)
                            ->required(),
                        Toggle::make('is_active')
                            ->label('Active')
                            ->default(true),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
                CmsForm::seo(),
            ]);
    }
}
