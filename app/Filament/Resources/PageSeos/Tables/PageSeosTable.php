<?php

namespace App\Filament\Resources\PageSeos\Tables;

use App\Filament\Resources\Support\CmsTableActions;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

final class PageSeosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('label')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('route_name')
                    ->label('Route')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('path')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('seo.title')
                    ->label('SEO title')
                    ->placeholder('-')
                    ->toggleable(),
                TextInputColumn::make('sort_order')
                    ->width(10)
                    ->sortable(),
                ToggleColumn::make('is_active')
                    ->label('Active'),
            ])
            ->recordActions(CmsTableActions::record(false))
            ->toolbarActions(CmsTableActions::bulk(false));
    }
}
