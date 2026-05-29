<?php

namespace App\Filament\Resources\EventRegistrations\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class EventRegistrationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Registration')
                    ->schema([
                        TextEntry::make('event.title')
                            ->label('Event'),
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                        TextEntry::make('phone')
                            ->placeholder('-'),
                        TextEntry::make('organization')
                            ->placeholder('-'),
                        TextEntry::make('role')
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('registered_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('responded_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('notes')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        ...CmsInfolist::timestamps(true),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
