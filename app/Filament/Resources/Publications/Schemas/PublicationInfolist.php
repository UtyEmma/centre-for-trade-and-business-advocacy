<?php

namespace App\Filament\Resources\Publications\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PublicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Publication')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('cover_image')
                            ->collection('cover_image')
                            ->label('Cover image'),
                        TextEntry::make('publicationType.name')
                            ->label('Type'),
                        TextEntry::make('service.title')
                            ->label('Service')
                            ->placeholder('-'),
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('publication_year')
                            ->placeholder('-'),
                        TextEntry::make('published_at')
                            ->date()
                            ->placeholder('-'),
                        TextEntry::make('external_url')
                            ->label('External URL')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-'),
                        TextEntry::make('summary')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
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
