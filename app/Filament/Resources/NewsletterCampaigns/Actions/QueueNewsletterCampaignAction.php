<?php

namespace App\Filament\Resources\NewsletterCampaigns\Actions;

use App\Actions\Newsletters\QueueNewsletterCampaign;
use App\Models\NewsletterCampaign;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Icons\Heroicon;
use Throwable;

final class QueueNewsletterCampaignAction
{
    public static function make(): Action
    {
        return Action::make('queueCampaign')
            ->label('Send campaign')
            ->icon(Heroicon::OutlinedPaperAirplane)
            ->color('success')
            ->requiresConfirmation()
            ->modalHeading('Send newsletter campaign')
            ->modalDescription('This will snapshot all active subscribers and queue one email job per recipient.')
            ->visible(fn (NewsletterCampaign $record): bool => $record->canBeQueued())
            ->action(function (NewsletterCampaign $record): void {
                try {
                    $campaign = app(QueueNewsletterCampaign::class)->handle($record);

                    Notification::make()
                        ->title($campaign->recipient_count > 0 ? 'Campaign queued' : 'Campaign marked sent')
                        ->body($campaign->recipient_count > 0
                            ? "{$campaign->recipient_count} recipients were added to the send queue."
                            : 'There are no active subscribers to send this campaign to.')
                        ->success()
                        ->send();
                } catch (Throwable $exception) {
                    report($exception);

                    Notification::make()
                        ->title('Campaign could not be queued')
                        ->body($exception->getMessage())
                        ->danger()
                        ->send();
                }
            });
    }
}
