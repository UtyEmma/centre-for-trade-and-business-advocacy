<?php

namespace App\Filament\Resources\Faqs\Tables;

use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Support\Pages;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextInputColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class FaqsTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('question')
                    ->searchable()
                    ->limit(80),
                TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                TextInputColumn::make('sort_order')
                    ->sortable(),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options(fn (): array => \App\Models\Faq::query()
                        ->whereNotNull('category')
                        ->distinct()
                        ->orderBy('category')
                        ->pluck('category', 'category')
                        ->all()),
                SelectFilter::make('page')
                    ->options(Pages::list()),
                TernaryFilter::make('is_published')
                    ->label('Published'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
