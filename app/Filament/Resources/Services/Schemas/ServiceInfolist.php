<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Wallacemartinss\FilamentIconPicker\Infolists\Components\IconPickerEntry;

final class ServiceInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Service')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('image')
                            ->collection('image')
                            ->label('Image'),
                        IconPickerEntry::make('icon')
                            ->label('Icon'),
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('summary')
                            ->columnSpanFull(),
                        TextEntry::make('description')
                            ->html()
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
