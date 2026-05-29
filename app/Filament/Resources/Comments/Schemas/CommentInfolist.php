<?php

namespace App\Filament\Resources\Comments\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CommentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Comment')
                    ->schema([
                        TextEntry::make('commentable.title')
                            ->label('Commentable')
                            ->placeholder('-'),
                        TextEntry::make('parent.comment')
                            ->label('Parent comment')
                            ->limit(80)
                            ->placeholder('-'),
                        TextEntry::make('user.name')
                            ->label('User')
                            ->placeholder('-'),
                        TextEntry::make('name')
                            ->placeholder('-'),
                        TextEntry::make('email')
                            ->placeholder('-'),
                        TextEntry::make('website_url')
                            ->label('Website URL')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-'),
                        TextEntry::make('comment')
                            ->html()
                            ->columnSpanFull(),
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('approved_at')
                            ->dateTime()
                            ->placeholder('-'),
                        ...CmsInfolist::timestamps(true),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
