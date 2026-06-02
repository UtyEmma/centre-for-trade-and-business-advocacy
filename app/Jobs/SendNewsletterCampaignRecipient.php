<?php

namespace App\Jobs;

use App\Enums\NewsletterCampaignRecipientStatus;
use App\Enums\NewsletterCampaignStatus;
use App\Enums\NewsletterSubscriberStatus;
use App\Mail\NewsletterCampaignMail;
use App\Models\NewsletterCampaign;
use App\Models\NewsletterCampaignRecipient;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SendNewsletterCampaignRecipient implements ShouldQueue
{
    use Queueable;

    public int $tries = 1;

    public function __construct(public NewsletterCampaignRecipient $recipient) {}

    public function handle(): void
    {
        $recipient = $this->recipient->fresh(['campaign', 'subscriber']);

        if (! $recipient || $recipient->status !== NewsletterCampaignRecipientStatus::Pending) {
            return;
        }

        $campaign = $recipient->campaign;

        $campaign->forceFill([
            'status' => NewsletterCampaignStatus::Sending,
            'started_at' => $campaign->started_at ?? now(),
        ])->save();

        try {
            if (! $recipient->subscriber || $recipient->subscriber->status !== NewsletterSubscriberStatus::Active) {
                $recipient->forceFill([
                    'status' => NewsletterCampaignRecipientStatus::Skipped,
                    'failure_reason' => 'Subscriber is no longer active.',
                ])->save();

                $this->refreshCampaignStatus($campaign);

                return;
            }

            Mail::to($recipient->email, $recipient->name)
                ->send(new NewsletterCampaignMail($recipient));

            $recipient->forceFill([
                'status' => NewsletterCampaignRecipientStatus::Sent,
                'sent_at' => now(),
                'failure_reason' => null,
            ])->save();
        } catch (Throwable $exception) {
            report($exception);

            $recipient->forceFill([
                'status' => NewsletterCampaignRecipientStatus::Failed,
                'failed_at' => now(),
                'failure_reason' => $exception->getMessage(),
            ])->save();
        }

        $this->refreshCampaignStatus($campaign);
    }

    protected function refreshCampaignStatus(NewsletterCampaign $campaign): void
    {
        $pendingCount = $campaign->recipients()
            ->where('status', NewsletterCampaignRecipientStatus::Pending->value)
            ->count();
        $sentCount = $campaign->recipients()
            ->where('status', NewsletterCampaignRecipientStatus::Sent->value)
            ->count();
        $failedCount = $campaign->recipients()
            ->where('status', NewsletterCampaignRecipientStatus::Failed->value)
            ->count();

        $campaign->forceFill([
            'sent_count' => $sentCount,
            'failed_count' => $failedCount,
            'status' => $pendingCount > 0
                ? NewsletterCampaignStatus::Sending
                : ($failedCount > 0 ? NewsletterCampaignStatus::Failed : NewsletterCampaignStatus::Sent),
            'sent_at' => $pendingCount === 0 && $failedCount === 0 ? now() : $campaign->sent_at,
            'failed_at' => $pendingCount === 0 && $failedCount > 0 ? now() : $campaign->failed_at,
        ])->save();
    }
}
