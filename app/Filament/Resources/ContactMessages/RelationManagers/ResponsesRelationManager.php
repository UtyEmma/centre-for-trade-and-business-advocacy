<?php

namespace App\Filament\Resources\ContactMessages\RelationManagers;

use App\Enums\ContactMessageResponseStatus;
use App\Filament\Resources\ContactMessageResponses\Actions\SendContactMessageResponseAction;
use App\Filament\Resources\ContactMessageResponses\Schemas\ContactMessageResponseForm;
use App\Filament\Resources\ContactMessageResponses\Schemas\ContactMessageResponseInfolist;
use App\Filament\Resources\ContactMessageResponses\Tables\ContactMessageResponsesTable;
use App\Models\ContactMessageResponse;
use Filament\Actions\CreateAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ResponsesRelationManager extends RelationManager
{
    protected static string $relationship = 'responses';

    public function form(Schema $schema): Schema
    {
        return ContactMessageResponseForm::configure($schema, includeContactMessage: false);
    }

    public function infolist(Schema $schema): Schema
    {
        return ContactMessageResponseInfolist::configure($schema);
    }

    public function table(Table $table): Table
    {
        return ContactMessageResponsesTable::configure($table, includeContactMessage: false)
            ->headerActions([
                CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['status'] = ContactMessageResponseStatus::Draft->value;
                        $data['user_id'] ??= auth()->id();

                        return $data;
                    }),
            ])
            ->recordActions([
                SendContactMessageResponseAction::make(),
                ViewAction::make(),
                EditAction::make()
                    ->visible(fn (ContactMessageResponse $record): bool => $record->status === ContactMessageResponseStatus::Draft),
            ]);
    }
}
