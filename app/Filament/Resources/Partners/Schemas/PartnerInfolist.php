<?php

namespace App\Filament\Resources\Partners\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PartnerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Partner')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('logo')
                            ->collection('logo')
                            ->label('Logo'),
                        TextEntry::make('partnerType.name')
                            ->label('Type'),
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('website_url')
                            ->label('Website URL')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-'),
                        TextEntry::make('description')
                            ->html()
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
