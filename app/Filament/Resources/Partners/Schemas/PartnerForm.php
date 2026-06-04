<?php

namespace App\Filament\Resources\Partners\Schemas;

use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Partner')
                    ->schema([
                        ...CmsForm::titleAndSlug('name', 'Name'),
                        TextInput::make('website_url')
                            ->label('Website URL')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        // RichEditor::make('description')
                        //     ->columnSpanFull(),
                        CmsForm::imageUpload('logo', 'Logo'),
                    ])
                    ->columns(2)
                    ->columnSpan(2),
                Section::make('Settings')
                    ->schema([
                        Select::make('partner_type_id')
                            ->label('Type')
                            ->relationship('partnerType', 'name')
                            ->searchable()
                            ->preload()
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
                            ->default(true),
                    ])
                    ->columns(1)
                    ->columnSpan(1),
            ]);
    }
}
