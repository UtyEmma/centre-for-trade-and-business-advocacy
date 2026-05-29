<?php

namespace App\Filament\Resources\Partners\Tables;

use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class PartnersTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                SpatieMediaLibraryImageColumn::make('logo')
                    ->collection('logo')
                    ->label('Logo'),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('partnerType.name')
                    ->label('Type')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('website_url')
                    ->label('Website')
                    ->searchable()
                    ->placeholder('-')
                    ->toggleable(),
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
                SelectFilter::make('partner_type_id')
                    ->label('Type')
                    ->relationship('partnerType', 'name')
                    ->searchable()
                    ->preload(),
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
