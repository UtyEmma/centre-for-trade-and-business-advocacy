<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class EventInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Event')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('featured_image')
                            ->collection('featured_image')
                            ->label('Featured image'),
                        SpatieMediaLibraryImageEntry::make('banner')
                            ->collection('banner')
                            ->label('Banner'),
                        TextEntry::make('eventType.name')
                            ->label('Type'),
                        TextEntry::make('service.title')
                            ->label('Service')
                            ->placeholder('-'),
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('summary')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('description')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Schedule and registration')
                    ->schema([
                        TextEntry::make('format')
                            ->formatStateUsing(fn (string $state): string => str($state)->replace('_', ' ')->headline()->toString()),
                        TextEntry::make('venue')
                            ->placeholder('-'),
                        TextEntry::make('location')
                            ->placeholder('-'),
                        TextEntry::make('online_url')
                            ->label('Online URL')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-'),
                        TextEntry::make('external_registration_url')
                            ->label('Registration URL')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-'),
                        TextEntry::make('capacity')
                            ->placeholder('-'),
                        TextEntry::make('start_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('end_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('registration_deadline')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->badge(),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Section::make('Publishing')
                    ->schema([
                        TextEntry::make('sort_order'),
                        IconEntry::make('is_featured')
                            ->label('Featured')
                            ->boolean(),
                        IconEntry::make('is_published')
                            ->label('Published')
                            ->boolean(),
                        ...CmsInfolist::timestamps(true),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
