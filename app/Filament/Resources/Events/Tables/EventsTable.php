<?php

namespace App\Filament\Resources\Events\Tables;

use App\Enums\EventStatus;
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

final class EventsTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->reorderable('sort_order')
            ->defaultSort('start_at', 'desc')
            ->columns([
                SpatieMediaLibraryImageColumn::make('featured_image')
                    ->collection('featured_image')
                    ->label('Image'),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('eventType.name')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('service.title')
                    ->label('Service')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('format')
                    ->formatStateUsing(fn (string $state): string => str($state)->replace('_', ' ')->headline()->toString())
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('start_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('event_type_id')
                    ->label('Type')
                    ->relationship('eventType', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('service_id')
                    ->label('Service')
                    ->relationship('service', 'title')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('format')
                    ->options([
                        'in_person' => 'In person',
                        'online' => 'Online',
                        'hybrid' => 'Hybrid',
                    ]),
                SelectFilter::make('status')
                    ->options(EventStatus::class),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_published')
                    ->label('Published'),
                DateRangeFilter::make('start_at', 'Start date'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
