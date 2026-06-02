<?php

namespace App\Filament\Resources\NewsletterSubscribers\Schemas;

use App\Enums\NewsletterSubscriberStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class NewsletterSubscriberForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Subscriber')
                    ->schema([
                        TextInput::make('name')
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        Select::make('status')
                            ->options(NewsletterSubscriberStatus::class)
                            ->default(NewsletterSubscriberStatus::Pending->value)
                            ->required(),
                        TextInput::make('source')
                            ->maxLength(255),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Timeline')
                    ->schema([
                        DateTimePicker::make('subscribed_at')
                            ->seconds(false),
                        DateTimePicker::make('confirmed_at')
                            ->seconds(false),
                        DateTimePicker::make('confirmation_sent_at')
                            ->seconds(false),
                        DateTimePicker::make('unsubscribed_at')
                            ->seconds(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
