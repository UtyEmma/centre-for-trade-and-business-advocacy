<?php

namespace App\Filament\Resources\NewsletterSubscribers\Actions;

use App\Enums\NewsletterSubscriberStatus;
use App\Filament\Resources\NewsletterSubscribers\Pages\ListNewsletterSubscribers;
use App\Models\NewsletterSubscriber;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Symfony\Component\HttpFoundation\StreamedResponse;

final class ExportNewsletterSubscribersAction
{
    public static function make(): Action
    {
        return Action::make('exportSubscribers')
            ->label('Export CSV')
            ->icon(Heroicon::OutlinedArrowDownTray)
            ->color('gray')
            ->action(function (ListNewsletterSubscribers $livewire): StreamedResponse {
                $query = $livewire->getTableQueryForExport();
                $filename = 'newsletter-subscribers-'.now()->format('Y-m-d-His').'.csv';

                return response()->streamDownload(function () use ($query): void {
                    $output = fopen('php://output', 'w');

                    if ($output === false) {
                        return;
                    }

                    fputcsv($output, [
                        'Name',
                        'Email',
                        'Status',
                        'Source',
                        'Subscribed At',
                        'Confirmed At',
                        'Unsubscribed At',
                        'Created At',
                    ]);

                    foreach ($query->cursor() as $subscriber) {
                        if (! $subscriber instanceof NewsletterSubscriber) {
                            continue;
                        }

                        fputcsv($output, [
                            $subscriber->name,
                            $subscriber->email,
                            $subscriber->status instanceof NewsletterSubscriberStatus
                                ? $subscriber->status->getLabel()
                                : $subscriber->status,
                            $subscriber->source,
                            $subscriber->subscribed_at?->toDateTimeString(),
                            $subscriber->confirmed_at?->toDateTimeString(),
                            $subscriber->unsubscribed_at?->toDateTimeString(),
                            $subscriber->created_at?->toDateTimeString(),
                        ]);
                    }

                    fclose($output);
                }, $filename, [
                    'Content-Type' => 'text/csv',
                ]);
            });
    }
}
