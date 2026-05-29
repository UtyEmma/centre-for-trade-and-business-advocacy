<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PostInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Post')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('featured_image')
                            ->collection('featured_image')
                            ->label('Featured image'),
                        TextEntry::make('postCategory.name')
                            ->label('Category'),
                        TextEntry::make('user.name')
                            ->label('Author'),
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('tags.name')
                            ->badge()
                            ->placeholder('-'),
                        TextEntry::make('excerpt')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('content')
                            ->html()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Publishing')
                    ->schema([
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('published_at')
                            ->dateTime()
                            ->placeholder('-'),
                        IconEntry::make('allow_comments')
                            ->label('Allow comments')
                            ->boolean(),
                        IconEntry::make('is_featured')
                            ->label('Featured')
                            ->boolean(),
                        ...CmsInfolist::timestamps(true),
                    ])
                    ->columns(4)
                    ->columnSpanFull(),
            ]);
    }
}
