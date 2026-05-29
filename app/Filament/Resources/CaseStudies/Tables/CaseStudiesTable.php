<?php

namespace App\Filament\Resources\CaseStudies\Tables;

use App\Enums\CaseStudyStatus;
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

final class CaseStudiesTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->defaultSort('created_at', 'desc')
            ->columns([
                SpatieMediaLibraryImageColumn::make('featured_image')
                    ->collection('featured_image')
                    ->label('Image'),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.title')
                    ->label('Service')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('partner')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('service_id')
                    ->label('Service')
                    ->relationship('service', 'title')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('status')
                    ->options(CaseStudyStatus::class),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_published')
                    ->label('Published'),
                DateRangeFilter::make('start_date', 'Start date'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
