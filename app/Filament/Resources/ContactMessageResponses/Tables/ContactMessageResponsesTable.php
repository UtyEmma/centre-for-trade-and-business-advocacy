<?php

namespace App\Filament\Resources\ContactMessageResponses\Tables;

use App\Enums\ContactMessageResponseStatus;
use App\Filament\Resources\ContactMessageResponses\Actions\SendContactMessageResponseAction;
use App\Filament\Resources\Support\CmsTable;
use App\Filament\Resources\Support\CmsTableActions;
use App\Filament\Resources\Support\DateRangeFilter;
use App\Models\ContactMessageResponse;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

final class ContactMessageResponsesTable
{
    public static function configure(Table $table, bool $includeContactMessage = true): Table
    {
        return CmsTable::withSoftDeletes($table
            ->defaultSort('created_at', 'desc')
            ->columns([
                ...($includeContactMessage ? [
                    TextColumn::make('contactMessage.subject')
                        ->label('Contact message')
                        ->searchable()
                        ->sortable(),
                ] : []),
                TextColumn::make('subject')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('respondedBy.name')
                    ->label('Responder')
                    ->searchable()
                    ->sortable()
                    ->placeholder('-'),
                TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                TextColumn::make('response')
                    ->html()
                    ->limit(80)
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Drafted at')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('sent_at')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('-'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(ContactMessageResponseStatus::class),
                DateRangeFilter::make('sent_at', 'Sent date'),
                DateRangeFilter::make('created_at', 'Drafted date'),
                TrashedFilter::make(),
            ])
            ->recordActions([
                SendContactMessageResponseAction::make(),
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn (ContactMessageResponse $record): bool => $record->status === ContactMessageResponseStatus::Draft),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->toolbarActions(CmsTableActions::bulk()));
    }
}
