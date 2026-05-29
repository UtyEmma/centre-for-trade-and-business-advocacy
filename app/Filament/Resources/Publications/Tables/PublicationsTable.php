<?php

namespace App\Filament\Resources\Publications\Tables;

use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Filament\Resources\Support\DateRangeFilter;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class PublicationsTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover_image')
                    ->collection('cover_image')
                    ->label('Cover'),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('publicationType.name')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.title')
                    ->label('Service')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('publication_year')
                    ->sortable()
                    ->placeholder('-'),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                TextColumn::make('published_at')
                    ->date()
                    ->sortable()
                    ->placeholder('-'),
            ])
            ->filters([
                SelectFilter::make('publication_type_id')
                    ->label('Type')
                    ->relationship('publicationType', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('service_id')
                    ->label('Service')
                    ->relationship('service', 'title')
                    ->searchable()
                    ->preload(),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_published')
                    ->label('Published'),
                DateRangeFilter::make('published_at', 'Published date'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
