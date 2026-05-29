<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use App\Enums\ContactMessageStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Contact message')
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
                        TextInput::make('subject')
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('message')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('admin_notes')
                            ->label('Admin notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('status')
                            ->options(ContactMessageStatus::class)
                            ->default(ContactMessageStatus::New->value)
                            ->required(),
                        DateTimePicker::make('responded_at')
                            ->seconds(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
