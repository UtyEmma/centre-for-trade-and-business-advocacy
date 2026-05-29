<?php

namespace App\Filament\Resources\ContactMessageResponses\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ContactMessageResponseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Response')
                    ->schema([
                        TextEntry::make('contactMessage.subject')
                            ->label('Contact message'),
                        TextEntry::make('respondedBy.name')
                            ->label('Responder')
                            ->placeholder('-'),
                        TextEntry::make('subject')
                            ->columnSpanFull(),
                        TextEntry::make('response')
                            ->html()
                            ->columnSpanFull(),
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('sent_at')
                            ->dateTime()
                            ->placeholder('-'),
                        ...CmsInfolist::timestamps(true),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
