<?php

namespace App\Actions\Newsletters;

use App\Enums\NewsletterCampaignRecipientStatus;
use App\Enums\NewsletterCampaignStatus;
use App\Jobs\SendNewsletterCampaignRecipient;
use App\Models\NewsletterCampaign;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class QueueNewsletterCampaign
{
    public function handle(NewsletterCampaign $campaign): NewsletterCampaign
    {
        if (! $campaign->canBeQueued()) {
            throw new RuntimeException('Only draft, failed, or cancelled campaigns can be queued.');
        }

        DB::transaction(function () use ($campaign): void {
            $campaign->recipients()->delete();

            $subscribers = NewsletterSubscriber::query()
                ->active()
                ->orderBy('email')
                ->get(['id', 'email', 'name']);

            $campaign->forceFill([
                'status' => $subscribers->isEmpty() ? NewsletterCampaignStatus::Sent : NewsletterCampaignStatus::Queued,
                'recipient_count' => $subscribers->count(),
                'sent_count' => 0,
                'failed_count' => 0,
                'queued_at' => now(),
                'started_at' => null,
                'sent_at' => $subscribers->isEmpty() ? now() : null,
                'failed_at' => null,
                'cancelled_at' => null,
            ])->save();

            foreach ($subscribers as $subscriber) {
                $campaign->recipients()->create([
                    'newsletter_subscriber_id' => $subscriber->id,
                    'email' => $subscriber->email,
                    'name' => $subscriber->name,
                    'status' => NewsletterCampaignRecipientStatus::Pending,
                ]);
            }
        });

        $campaign->refresh();

        $campaign->recipients()
            ->where('status', NewsletterCampaignRecipientStatus::Pending->value)
            ->eachById(fn ($recipient): mixed => SendNewsletterCampaignRecipient::dispatch($recipient));

        return $campaign->refresh();
    }
}
