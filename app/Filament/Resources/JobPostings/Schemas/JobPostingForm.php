<?php

namespace App\Filament\Resources\JobPostings\Schemas;

use App\Enums\JobPostingStatus;
use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JobPostingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Grid::make(1)
                    ->columnSpan(2)
                    ->schema([
                        Section::make('Job posting')
                            ->schema([
                                ...CmsForm::titleAndSlug(),
                                Textarea::make('summary')
                                    ->maxLength(65535)
                                    ->columnSpanFull(),
                                RichEditor::make('description')
                                    ->columnSpanFull(),
                                RichEditor::make('responsibilities')
                                    ->columnSpanFull(),
                                RichEditor::make('requirements')
                                    ->columnSpanFull(),
                                RichEditor::make('benefits')
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                            ->columnSpan(2),
                        Section::make('Details')
                            ->schema([
                                TextInput::make('department')
                                    ->maxLength(255),
                                TextInput::make('location')
                                    ->maxLength(255),
                                Select::make('employment_type')
                                    ->options([
                                        'full_time' => 'Full time',
                                        'part_time' => 'Part time',
                                        'contract' => 'Contract',
                                        'internship' => 'Internship',
                                    ])
                                    ->default('full_time')
                                    ->required(),
                                Select::make('workplace_type')
                                    ->options([
                                        'onsite' => 'Onsite',
                                        'remote' => 'Remote',
                                        'hybrid' => 'Hybrid',
                                    ])
                                    ->default('onsite')
                                    ->required(),
                                TextInput::make('salary_range')
                                    ->maxLength(255),
                                TextInput::make('application_url')
                                    ->label('Application URL')
                                    ->url()
                                    ->maxLength(255),
                                TextInput::make('application_email')
                                    ->label('Application email')
                                    ->email()
                                    ->maxLength(255),
                            ])
                            ->columns(2),
                    ]),
                Section::make('Settings')
                    ->schema([
                        DateTimePicker::make('application_deadline')
                            ->seconds(false),
                        Select::make('status')
                            ->options(JobPostingStatus::class)
                            ->default(JobPostingStatus::Draft->value)
                            ->required(),
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
                            ->default(false),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
