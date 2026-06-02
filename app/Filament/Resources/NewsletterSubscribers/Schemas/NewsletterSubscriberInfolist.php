<?php

namespace App\Filament\Resources\NewsletterSubscribers\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NewsletterSubscriberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Subscriber')
                    ->schema([
                        TextEntry::make('name')
                            ->placeholder('-'),
                        TextEntry::make('email')
                            ->copyable(),
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('source')
                            ->placeholder('-'),
                        TextEntry::make('ip_address')
                            ->label('IP address')
                            ->placeholder('-')
                            ->copyable(),
                        TextEntry::make('user_agent')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Section::make('Timeline')
                    ->schema([
                        TextEntry::make('subscribed_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('confirmed_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('confirmation_sent_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('unsubscribed_at')
                            ->dateTime()
                            ->placeholder('-'),
                        ...CmsInfolist::timestamps(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
