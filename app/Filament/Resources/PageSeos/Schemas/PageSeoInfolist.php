<?php

namespace App\Filament\Resources\PageSeos\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PageSeoInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Page')
                    ->schema([
                        TextEntry::make('label'),
                        TextEntry::make('route_name')
                            ->label('Route'),
                        TextEntry::make('path'),
                        TextEntry::make('seo.title')
                            ->label('SEO title')
                            ->placeholder('-'),
                        TextEntry::make('seo.description')
                            ->label('SEO description')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Settings')
                    ->schema([
                        TextEntry::make('sort_order'),
                        IconEntry::make('is_active')
                            ->label('Active')
                            ->boolean(),
                        ...CmsInfolist::timestamps(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
