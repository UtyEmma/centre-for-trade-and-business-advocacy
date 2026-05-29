<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class TestimonialInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Testimonial')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('profile_photo')
                            ->collection('profile_photo')
                            ->label('Profile photo'),
                        SpatieMediaLibraryImageEntry::make('logo')
                            ->collection('logo')
                            ->label('Logo'),
                        TextEntry::make('name'),
                        TextEntry::make('role')
                            ->placeholder('-'),
                        TextEntry::make('organization')
                            ->placeholder('-'),
                        TextEntry::make('location')
                            ->placeholder('-'),
                        TextEntry::make('rating')
                            ->placeholder('-'),
                        TextEntry::make('website_url')
                            ->label('Website URL')
                            ->url(fn (?string $state): ?string => $state),
                        TextEntry::make('quote')
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
