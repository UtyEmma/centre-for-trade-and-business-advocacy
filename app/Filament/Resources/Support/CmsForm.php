<?php

namespace App\Filament\Resources\Support;

use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;
use RalphJSmit\Filament\SEO\SEO as FilamentSeo;

final class CmsForm
{
    /**
     * @return array<int, TextInput>
     */
    public static function titleAndSlug(string $titleField = 'title', string $titleLabel = 'Title'): array
    {
        return [
            TextInput::make($titleField)
                ->label($titleLabel)
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(fn (Set $set, ?string $state): mixed => $set('slug', Str::slug($state ?? ''))),
            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),
        ];
    }

    public static function imageUpload(string $collection, string $label, bool $multiple = false): SpatieMediaLibraryFileUpload
    {
        return SpatieMediaLibraryFileUpload::make($collection)
            ->label($label)
            ->collection($collection)
            ->image()
            ->optimize(config('app.image_format'))
            ->multiple($multiple)
            ->imageEditor()
            ->reorderable($multiple);
    }

    public static function fileUpload(string $collection, string $label): SpatieMediaLibraryFileUpload
    {
        return SpatieMediaLibraryFileUpload::make($collection)
            ->label($label)
            ->collection($collection)
            ->visibility('public');
    }

    public static function seo(): Section
    {
        return Section::make('SEO')
            ->schema([
                FilamentSeo::make(),
            ])
            ->columns(2)
            ->columnSpanFull();
    }
}
