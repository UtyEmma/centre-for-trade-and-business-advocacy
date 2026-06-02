<?php

namespace App\Filament\Resources\NewsletterSubscribers\Actions;

use App\Actions\Newsletters\SendNewsletterConfirmation;
use App\Enums\NewsletterSubscriberStatus;
use App\Models\NewsletterSubscriber;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Throwable;

final class ResendNewsletterConfirmationAction
{
    public static function make(): Action
    {
        return Action::make('resendConfirmation')
            ->label('Resend confirmation')
            ->icon(Heroicon::OutlinedEnvelope)
            ->color('gray')
            ->requiresConfirmation()
            ->modalHeading('Resend confirmation email')
            ->modalDescription('This will send a fresh signed confirmation link to this pending subscriber.')
            ->visible(fn (NewsletterSubscriber $record): bool => $record->status === NewsletterSubscriberStatus::Pending)
            ->action(function (NewsletterSubscriber $record): void {
                try {
                    app(SendNewsletterConfirmation::class)->handle($record);

                    Notification::make()
                        ->title('Confirmation email sent')
                        ->success()
                        ->send();
                } catch (Throwable $exception) {
                    report($exception);

                    Notification::make()
                        ->title('Confirmation email could not be sent')
                        ->body($exception->getMessage())
                        ->danger()
                        ->send();
                }
            });
    }
}
