<?php

namespace App\Filament\Resources\ContactMessageResponses\Schemas;

use App\Enums\ContactMessageResponseStatus;
use App\Models\ContactMessageResponse;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ContactMessageResponseForm
{
    public static function configure(Schema $schema, bool $includeContactMessage = true): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Response')
                    ->schema([
                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        RichEditor::make('response')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        ...($includeContactMessage ? [
                            Select::make('contact_message_id')
                                ->label('Contact message')
                                ->relationship('contactMessage', 'subject')
                                ->searchable()
                                ->preload()
                                ->required(),
                        ] : []),
                        Select::make('user_id')
                            ->label('Responder')
                            ->relationship('respondedBy', 'name')
                            ->searchable()
                            ->preload(),
                        Hidden::make('status')
                            ->default(ContactMessageResponseStatus::Draft->value),
                        Select::make('status_display')
                            ->label('Status')
                            ->options(ContactMessageResponseStatus::class)
                            ->formatStateUsing(fn (?ContactMessageResponse $record): string => ($record?->status ?? ContactMessageResponseStatus::Draft)->value)
                            ->disabled()
                            ->dehydrated(false),
                        DateTimePicker::make('sent_at')
                            ->seconds(false)
                            ->disabled()
                            ->dehydrated(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
