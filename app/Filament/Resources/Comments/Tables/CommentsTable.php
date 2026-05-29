<?php

namespace App\Filament\Resources\Comments\Tables;

use App\Enums\CommentStatus;
use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Filament\Resources\Support\DateRangeFilter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class CommentsTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('comment')
                    ->html()
                    ->limit(80)
                    ->searchable(),
                TextColumn::make('commentable.title')
                    ->label('Commentable')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('name')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('email')
                    ->searchable()
                    ->placeholder('-'),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('approved_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(CommentStatus::class),
                SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
                DateRangeFilter::make('approved_at', 'Approved date'),
                DateRangeFilter::make('created_at', 'Created date'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
