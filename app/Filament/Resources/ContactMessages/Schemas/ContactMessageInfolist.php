<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ContactMessageInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Contact message')
                    ->schema([
                        TextEntry::make('name'),
                        TextEntry::make('email'),
                        TextEntry::make('phone')
                            ->placeholder('-'),
                        TextEntry::make('organization')
                            ->placeholder('-'),
                        TextEntry::make('subject')
                            ->columnSpanFull(),
                        TextEntry::make('message')
                            ->html()
                            ->columnSpanFull(),
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('responded_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('admin_notes')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        ...CmsInfolist::timestamps(true),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Section::make('Responses')
                    ->schema([
                        RepeatableEntry::make('responses')
                            ->schema([
                                TextEntry::make('respondedBy.name')
                                    ->label('Responder')
                                    ->placeholder('-'),
                                TextEntry::make('status')
                                    ->badge(),
                                TextEntry::make('created_at')
                                    ->label('Drafted at')
                                    ->dateTime(),
                                TextEntry::make('sent_at')
                                    ->label('Sent at')
                                    ->dateTime()
                                    ->placeholder('-'),
                                TextEntry::make('subject')
                                    ->columnSpanFull(),
                                TextEntry::make('response')
                                    ->html()
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
