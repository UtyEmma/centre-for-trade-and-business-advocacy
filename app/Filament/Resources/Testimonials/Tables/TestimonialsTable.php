<?php

namespace App\Filament\Resources\Testimonials\Tables;

use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class TestimonialsTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                SpatieMediaLibraryImageColumn::make('profile_photo')
                    ->collection('profile_photo')
                    ->label('Photo'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('organization')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('rating')
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('sort_order')
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
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
