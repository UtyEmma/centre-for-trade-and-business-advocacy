<?php

namespace App\Filament\Resources\JobApplications\Schemas;

use App\Filament\Resources\Support\CmsInfolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JobApplicationInfolist
{
    public static function configure(Schema $schema, bool $includeJobPosting = true): Schema
    {
        return $schema
            ->components([
                Section::make('Application')
                    ->schema([
                        ...($includeJobPosting ? [
                            TextEntry::make('jobPosting.title')
                                ->label('Job posting')
                                ->columnSpanFull(),
                        ] : []),
                        TextEntry::make('applicant_name')
                            ->label('Applicant'),
                        TextEntry::make('email'),
                        TextEntry::make('phone'),
                        TextEntry::make('linkedin_url')
                            ->label('LinkedIn or website')
                            ->url(fn (?string $state): ?string => $state)
                            ->placeholder('-')
                            ->columnSpanFull(),
                        TextEntry::make('resume_original_name')
                            ->label('Resume or CV')
                            ->placeholder('-'),
                        TextEntry::make('cover_letter_original_name')
                            ->label('Cover letter')
                            ->placeholder('-'),
                        TextEntry::make('status')
                            ->badge(),
                        TextEntry::make('submitted_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('reviewed_at')
                            ->dateTime()
                            ->placeholder('-'),
                        TextEntry::make('admin_notes')
                            ->html()
                            ->placeholder('-')
                            ->columnSpanFull(),
                        ...CmsInfolist::timestamps(true),
                    ])
                    ->columns(3)
                    ->columnSpanFull(),
            ]);
    }
}
