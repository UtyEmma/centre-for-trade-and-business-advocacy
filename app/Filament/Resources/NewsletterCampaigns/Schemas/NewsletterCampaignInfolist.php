<?php

namespace App\Filament\Resources\NewsletterCampaigns\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NewsletterCampaignInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Campaign')
                    ->schema([
                        TextEntry::make('subject')
                            ->columnSpanFull(),
                        TextEntry::make('preview_text')
                            ->label('Preview text')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                Section::make('Delivery')
                    ->schema([
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('recipient_count')
                            ->numeric()
                            ->label('Recipients'),
                        TextEntry::make('sent_count')
                            ->numeric()
                            ->label('Sent'),
                        TextEntry::make('failed_count')
                            ->numeric()
                            ->label('Failed'),
                        TextEntry::make('queued_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('started_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('sent_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('failed_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('cancelled_at')
                            ->dateTime()
                            ->placeholder('-'),
                        ...CmsInfolist::timestamps(),
                    ])
                    ->columns(4)
                    ->columnSpanFull(),
            ]);
    }
}
