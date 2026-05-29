<?php

namespace App\Filament\Resources\ContactMessageResponses\Actions;

use App\Actions\ContactMessages\SendContactMessageResponse;
use App\Enums\ContactMessageResponseStatus;
use App\Models\ContactMessageResponse;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Throwable;

final class SendContactMessageResponseAction
{
    public static function make(): Action
    {
        return Action::make('send')
            ->label('Send')
            ->icon(Heroicon::OutlinedPaperAirplane)
            ->color('success')
            ->requiresConfirmation()
            ->modalHeading('Send response')
            ->modalDescription('This will email the response and mark the contact message as responded.')
            ->visible(fn (ContactMessageResponse $record): bool => $record->status === ContactMessageResponseStatus::Draft)
            ->action(function (ContactMessageResponse $record): void {
                $responder = auth()->user();

                try {
                    app(SendContactMessageResponse::class)->handle(
                        $record,
                        $responder instanceof User ? $responder : null,
                    );

                    Notification::make()
                        ->title('Response sent')
                        ->success()
                        ->send();
                } catch (Throwable $exception) {
                    report($exception);

                    Notification::make()
                        ->title('Response could not be sent')
                        ->body($exception->getMessage())
                        ->danger()
                        ->send();
                }
            });
    }
}
