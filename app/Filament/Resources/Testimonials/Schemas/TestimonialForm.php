<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Testimonial')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('role')
                            ->maxLength(255),
                        TextInput::make('organization')
                            ->maxLength(255),
                        TextInput::make('location')
                            ->maxLength(255),
                        RichEditor::make('quote')
                            ->required()
                            ->columnSpanFull(),
                        CmsForm::imageUpload('profile_photo', 'Profile photo'),
                        CmsForm::imageUpload('logo', 'Logo'),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        TextInput::make('rating')
                            ->numeric()
                            ->integer()
                            ->minValue(1)
                            ->maxValue(5),
                        TextInput::make('website_url')
                            ->label('Website URL')
                            ->url()
                            ->maxLength(255),
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
