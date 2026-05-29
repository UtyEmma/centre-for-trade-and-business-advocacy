<?php

namespace App\Filament\Resources\Publications\Schemas;

use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PublicationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Publication')
                    ->schema([
                        ...CmsForm::titleAndSlug(),
                        Textarea::make('summary')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        TextInput::make('external_url')
                            ->label('External URL')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        CmsForm::fileUpload('document', 'Document'),
                        CmsForm::imageUpload('cover_image', 'Cover image'),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('publication_type_id')
                            ->label('Type')
                            ->relationship('publicationType', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('service_id')
                            ->label('Service')
                            ->relationship('service', 'title')
                            ->searchable()
                            ->preload(),
                        TextInput::make('publication_year')
                            ->numeric()
                            ->integer()
                            ->minValue(1900)
                            ->maxValue(2200),
                        DatePicker::make('published_at'),
                        TextInput::make('sort_order')
                            ->numeric()
                            ->integer()
                            ->default(0)
                            ->required(),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(true),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
