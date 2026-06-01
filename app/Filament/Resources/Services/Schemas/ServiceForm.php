<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Guava\IconPicker\Forms\Components\IconPicker;
use Wallacemartinss\FilamentIconPicker\Forms\Components\IconPickerField;

final class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Service')
                    ->schema([
                        ...CmsForm::titleAndSlug(),
                        IconPicker::make('icon')
                            ->label('Icon')
                            ->searchable(),
                        Textarea::make('summary')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        RichEditor::make('description')
                            ->columnSpanFull(),
                        CmsForm::imageUpload('image', 'Image')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
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
                CmsForm::seo(),
            ]);
    }
}
