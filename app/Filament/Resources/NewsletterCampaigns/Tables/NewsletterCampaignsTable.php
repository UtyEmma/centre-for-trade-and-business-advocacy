<?php

namespace App\Filament\Resources\NewsletterCampaigns\Tables;

use App\Enums\NewsletterCampaignStatus;
use App\Filament\Resources\NewsletterCampaigns\Actions\PreviewNewsletterCampaignAction;
use App\Filament\Resources\NewsletterCampaigns\Actions\QueueNewsletterCampaignAction;
use App\Filament\Resources\Support\DateRangeFilter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class NewsletterCampaignsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('subject')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('recipient_count')
                    ->label('Recipients')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sent_count')
                    ->label('Sent')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('failed_count')
                    ->label('Failed')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('queued_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('sent_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-')
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(NewsletterCampaignStatus::class),
                DateRangeFilter::make('queued_at', 'Queued date'),
                DateRangeFilter::make('sent_at', 'Sent date'),
                DateRangeFilter::make('created_at', 'Created date'),
            ])
            ->recordActions([
                PreviewNewsletterCampaignAction::make(),
                QueueNewsletterCampaignAction::make(),
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn ($record): bool => $record->canBeQueued()),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
