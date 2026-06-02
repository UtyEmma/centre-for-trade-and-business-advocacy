<?php

namespace App\Filament\Resources\NewsletterCampaigns\Schemas;

use App\Enums\NewsletterCampaignStatus;
use App\Support\NewsletterContent;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NewsletterCampaignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Campaign')
                    ->schema([
                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Variables: '.NewsletterContent::Variables)
                            ->columnSpanFull(),
                        Textarea::make('preview_text')
                            ->label('Preview text')
                            ->rows(3)
                            ->maxLength(255)
                            ->helperText('Variables: '.NewsletterContent::Variables)
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->required()
                            ->helperText('Variables: '.NewsletterContent::Variables)
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(2),
                Section::make('Sending')
                    ->schema([
                        TextInput::make('status')
                            ->formatStateUsing(fn ($state): string => match (true) {
                                $state instanceof NewsletterCampaignStatus => $state->getLabel(),
                                blank($state) => 'Draft',
                                default => str((string) $state)->headline()->toString(),
                            })
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('recipient_count')
                            ->label('Recipients')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('sent_count')
                            ->label('Sent')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(false),
                        TextInput::make('failed_count')
                            ->label('Failed')
                            ->numeric()
                            ->disabled()
                            ->dehydrated(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
