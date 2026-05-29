<?php

namespace App\Filament\Resources\PartnerTypes\Tables;

use App\Filament\Resources\Support\CmsTableActions;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

final class PartnerTypesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('partners_count')
                    ->counts('partners')
                    ->label('Partners')
                    ->sortable(),
                TextColumn::make('sort_order')
                    ->sortable(),
                IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
            ])
            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions(CmsTableActions::record(false))
            ->toolbarActions(CmsTableActions::bulk(false));
    }
}
