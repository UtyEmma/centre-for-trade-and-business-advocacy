<?php

namespace App\Filament\Resources\TeamMembers\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class TeamMemberInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Team member')
                    ->schema([
                        SpatieMediaLibraryImageEntry::make('profile_photo')
                            ->collection('profile_photo')
                            ->label('Profile photo'),
                        TextEntry::make('category.name')
                            ->label('Category'),
                        TextEntry::make('name'),
                        TextEntry::make('slug'),
                        TextEntry::make('role')
                            ->placeholder('-'),
                        TextEntry::make('email')
                            ->placeholder('-'),
                        TextEntry::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-'),
                        TextEntry::make('bio')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Publishing')
                    ->schema([
                        TextEntry::make('sort_order'),
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
