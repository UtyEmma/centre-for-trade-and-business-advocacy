<?php

namespace App\Filament\Resources\Faqs\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class FaqInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('FAQ')
                    ->schema([
                        TextEntry::make('question')
                            ->columnSpanFull(),
                        TextEntry::make('answer')
                            ->html()
                            ->columnSpanFull(),
                        TextEntry::make('category')
                            ->placeholder('-'),
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
