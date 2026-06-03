<?php

namespace App\Filament\Resources\Galleries\Schemas;

use App\Filament\Resources\Support\CmsForm;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

final class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([
                Section::make('Gallery')
                    ->schema([
                        ...CmsForm::titleAndSlug('name', 'Gallery title'),
                        Textarea::make('description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        SpatieMediaLibraryFileUpload::make('assets')
                            ->label('Images and videos')
                            ->collection('assets')
                            ->disk('public')
                            ->visibility('public')
                            ->acceptedFileTypes(['image/*', 'video/*'])
                            ->multiple()
                            ->panelLayout('grid')
                            // ->optimize(config('app.image_format'))
                            ->panelAspectRatio('2:1')
                            ->preserveFilenames()
                            ->imagePreviewHeight('400')
                            ->reorderable()
                            ->downloadable()
                            ->openable()
                            ->maxSize('122880')
                            ->helperText('Upload image and video files.')
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
            ]);
    }
}
