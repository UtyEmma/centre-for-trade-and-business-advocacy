<?php

namespace App\Filament\Resources\JobApplications\Schemas;

use App\Enums\JobApplicationStatus;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class JobApplicationForm
{
    public static function configure(Schema $schema, bool $includeJobPosting = true): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Applicant')
                    ->schema([
                        ...($includeJobPosting ? [
                            Select::make('job_posting_id')
                                ->label('Job posting')
                                ->relationship('jobPosting', 'title')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->columnSpanFull(),
                        ] : []),
                        TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->copyable()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->copyable()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('linkedin_url')
                            ->label('LinkedIn or website')
                            ->url()
                            ->copyable()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        FileUpload::make('resume_path')
                            ->label('Resume or CV')
                            ->disk('local')
                            ->directory('job-applications/admin')
                            ->visibility('private')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            ])
                            ->maxSize(10240)
                            ->storeFileNamesIn('resume_original_name')
                            ->downloadable()
                            ->required(),
                        FileUpload::make('cover_letter_path')
                            ->label('Cover letter')
                            ->disk('local')
                            ->directory('job-applications/admin')
                            ->visibility('private')
                            ->acceptedFileTypes([
                                'application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            ])
                            ->maxSize(10240)
                            ->storeFileNamesIn('cover_letter_original_name')
                            ->downloadable(),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Review')
                    ->schema([
                        Select::make('status')
                            ->options(JobApplicationStatus::class)
                            ->default(JobApplicationStatus::New->value)
                            ->required(),
                        DateTimePicker::make('submitted_at')
                            ->seconds(false),
                        DateTimePicker::make('reviewed_at')
                            ->seconds(false),
                        Textarea::make('admin_notes')
                            ->label('Admin notes')
                            ->columnSpanFull(),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
