<?php

namespace App\Filament\Resources\CaseStudies\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CaseStudyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Case study')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('featured_image')
                            ->collection('featured_image')
                            ->label('Featured image'),
                        TextEntry::make('service.title')
                            ->label('Service'),
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('partner'),
                        TextEntry::make('location'),
                        TextEntry::make('summary')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Timeline and publishing')
                    ->schema([
                        TextEntry::make('start_date')
                            ->date(),
                        TextEntry::make('end_date')
                            ->date(),
                        TextEntry::make('status')
                            ->badge(),
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
