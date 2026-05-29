<?php

namespace App\Filament\Resources\EventRegistrations\Schemas;

use App\Enums\EventRegistrationStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class EventRegistrationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Registration')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('organization')
                            ->maxLength(255),
                        TextInput::make('role')
                            ->maxLength(255),
                        RichEditor::make('notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('event_id')
                            ->relationship('event', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('status')
                            ->options(EventRegistrationStatus::class)
                            ->default(EventRegistrationStatus::Pending->value)
                            ->required(),
                        DateTimePicker::make('registered_at')
                            ->seconds(false),
                        DateTimePicker::make('responded_at')
                            ->seconds(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
