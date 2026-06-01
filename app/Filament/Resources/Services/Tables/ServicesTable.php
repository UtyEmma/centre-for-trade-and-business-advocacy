<?php

namespace App\Filament\Resources\Services\Tables;

use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Guava\IconPicker\Tables\Columns\IconColumn;

final class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                SpatieMediaLibraryImageColumn::make('image')
                    ->collection('image')
                    ->label('Image'),
                IconColumn::make('icon')
                    ->label('Icon'),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextInputColumn::make('sort_order')
                    ->width(10)
                    ->sortable(),
                ToggleColumn::make('is_featured')
                    ->label('Featured'),
                ToggleColumn::make('is_published')
                    ->label('Published'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_published')
                    ->label('Published'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
