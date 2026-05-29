<?php

namespace App\Filament\Resources\EventRegistrations\Tables;

use App\Enums\EventRegistrationStatus;
use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Filament\Resources\Support\DateRangeFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class EventRegistrationsTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->defaultSort('registered_at', 'desc')
            ->columns([
                TextColumn::make('event.title')
                    ->label('Event')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('organization')
                    ->searchable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('registered_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('responded_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('event_id')
                    ->label('Event')
                    ->relationship('event', 'title')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('status')
                    ->options(EventRegistrationStatus::class),
                DateRangeFilter::make('registered_at', 'Registered date'),
                DateRangeFilter::make('responded_at', 'Responded date'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
