<?php

namespace App\Filament\Resources\JobPostings\Tables;

use App\Enums\JobPostingStatus;
use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Filament\Resources\Support\DateRangeFilter;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class JobPostingsTable
{
    public static function configure(Table $table): Table
    {
        return CmsTable::withSoftDeletes($table
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('department')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('location')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('employment_type')
                    ->formatStateUsing(fn (string $state): string => str($state)->replace('_', ' ')->headline()->toString())
                    ->sortable(),
                TextColumn::make('workplace_type')
                    ->formatStateUsing(fn (string $state): string => str($state)->replace('_', ' ')->headline()->toString())
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('application_deadline')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(JobPostingStatus::class),
                SelectFilter::make('employment_type')
                    ->options([
                        'full_time' => 'Full time',
                        'part_time' => 'Part time',
                        'contract' => 'Contract',
                        'internship' => 'Internship',
                    ]),
                SelectFilter::make('workplace_type')
                    ->options([
                        'onsite' => 'Onsite',
                        'remote' => 'Remote',
                        'hybrid' => 'Hybrid',
                    ]),
                TernaryFilter::make('is_featured')
                    ->label('Featured'),
                TernaryFilter::make('is_published')
                    ->label('Published'),
                DateRangeFilter::make('application_deadline', 'Application deadline'),
                TrashedFilter::make(),
            ])
            ->recordActions(CmsTableActions::record())
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
