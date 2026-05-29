<?php

namespace App\Filament\Resources\Faqs\Schemas;

use App\Support\Pages;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Route;

final class FaqForm
{
    public static function configure(Schema $schema): Schema {  
        return $schema
            ->columns(3)
            ->components([
                Section::make('FAQ')
                    ->schema([
                        Textarea::make('question')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        RichEditor::make('answer')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        TextInput::make('category')
                            ->maxLength(255),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->integer()
                            ->default(0)
                            ->required(),
                        Select::make('page')
                            ->multiple()
                            ->native(false)
                            ->options(Pages::list()),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
