<?php

namespace App\Filament\Resources\Events\Schemas;

use App\Enums\EventStatus;
use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Event')
                    ->schema([
                        ...CmsForm::titleAndSlug(),
                        Textarea::make('summary')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        RichEditor::make('description')
                            ->columnSpanFull(),
                        Select::make('format')
                            ->options([
                                'in_person' => 'In person',
                                'online' => 'Online',
                                'hybrid' => 'Hybrid',
                            ])
                            ->default('in_person')
                            ->required(),
                        TextInput::make('venue')
                            ->maxLength(255),
                        TextInput::make('location')
                            ->maxLength(255),
                        TextInput::make('online_url')
                            ->label('Online URL')
                            ->url()
                            ->maxLength(255),
                        CmsForm::imageUpload('featured_image', 'Featured image'),
                        CmsForm::imageUpload('banner', 'Banner'),
                        TextInput::make('external_registration_url')
                            ->label('External registration URL')
                            ->url()
                            ->maxLength(255),
                        TextInput::make('capacity')
                            ->numeric()
                            ->integer()
                            ->minValue(1),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('event_type_id')
                            ->label('Type')
                            ->relationship('eventType', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Select::make('service_id')
                            ->label('Service')
                            ->relationship('service', 'title')
                            ->searchable()
                            ->preload(),
                        DateTimePicker::make('start_at')
                            ->seconds(false),
                        DateTimePicker::make('end_at')
                            ->seconds(false),
                        DateTimePicker::make('registration_deadline')
                            ->seconds(false),
                        Toggle::make('registrations_enabled')
                            ->label('Registrations enabled')
                            ->default(true),
                        Select::make('status')
                            ->options(EventStatus::class)
                            ->default(EventStatus::Draft->value)
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
                CmsForm::seo(),
            ]);
    }
}
