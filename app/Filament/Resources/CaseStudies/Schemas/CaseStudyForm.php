<?php

namespace App\Filament\Resources\CaseStudies\Schemas;

use App\Enums\CaseStudyStatus;
use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class CaseStudyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Case study')
                    ->schema([
                        ...CmsForm::titleAndSlug(),
                        TextInput::make('partner')
                            ->maxLength(255),
                        TextInput::make('location')
                            ->maxLength(255),
                        Textarea::make('summary')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        RichEditor::make('content')
                            ->columnSpanFull(),
                        CmsForm::imageUpload('featured_image', 'Featured image'),
                        CmsForm::imageUpload('gallery', 'Gallery', multiple: true),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('service_id')
                            ->relationship('service', 'title')
                            ->searchable()
                            ->preload()
                            ->required(),
                        DatePicker::make('start_date'),
                        DatePicker::make('end_date'),
                        Select::make('status')
                            ->options(CaseStudyStatus::class)
                            ->default(CaseStudyStatus::Draft->value)
                            ->required(),
                        Toggle::make('is_featured')
                            ->label('Featured')
                            ->default(false),
                        Toggle::make('is_published')
                            ->label('Published')
                            ->default(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
                CmsForm::seo(),
            ]);
    }
}
