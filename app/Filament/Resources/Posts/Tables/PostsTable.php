<?php

namespace App\Filament\Resources\Posts\Tables;

use App\Enums\PostStatus;
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

final class PostsTable
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
                TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
            ])
            ->filters([
                SelectFilter::make('post_category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('user_id')
                    ->label('Author')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('status')
                    ->options(PostStatus::class),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('allow_comments')
                    ->label('Allows comments'),
                DateRangeFilter::make('published_at', 'Published date'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
