<?php

namespace App\Filament\Resources\EventTypes\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class EventTypeInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Event type')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('description')
                            ->placeholder('-')
                            ->columnSpanFull(),
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
