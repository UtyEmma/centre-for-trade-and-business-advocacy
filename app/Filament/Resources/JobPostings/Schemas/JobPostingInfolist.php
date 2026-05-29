<?php

namespace App\Filament\Resources\JobPostings\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JobPostingInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Job posting')
                    ->schema([
                        TextEntry::make('title'),
                        TextEntry::make('slug'),
                        TextEntry::make('summary')
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('description')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('responsibilities')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('requirements')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('benefits')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Section::make('Details')
                    ->schema([
                        TextEntry::make('department')
                            ->placeholder('-'),
                        TextEntry::make('location')
                            ->placeholder('-'),
                        TextEntry::make('employment_type')
                            ->formatStateUsing(fn (string $state): string => str($state)->replace('_', ' ')->headline()->toString()),
                        TextEntry::make('workplace_type')
                            ->formatStateUsing(fn (string $state): string => str($state)->replace('_', ' ')->headline()->toString()),
                        TextEntry::make('salary_range')
                            ->placeholder('-'),
                        TextEntry::make('application_url')
                            ->label('Application URL')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-'),
                        TextEntry::make('application_email')
                            ->label('Application email')
                            ->url(fn (?string $state): ?string => filled($state) ? 'mailto:'.$state : null)
                            ->placeholder('-'),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
                Section::make('Publishing')
                    ->schema([
                        TextEntry::make('application_deadline')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->badge(),
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
