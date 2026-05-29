<?php

namespace App\Filament\Resources\ContactMessages\Tables;

use App\Enums\ContactMessageStatus;
use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Filament\Resources\Support\DateRangeFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class ContactMessagesTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('subject')
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
                TextColumn::make('responses_count')
                    ->counts('responses')
                    ->label('Responses')
                    ->sortable(),
                TextColumn::make('responded_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(ContactMessageStatus::class),
                DateRangeFilter::make('responded_at', 'Responded date'),
                DateRangeFilter::make('created_at', 'Created date'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
