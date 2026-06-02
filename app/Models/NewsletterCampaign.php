<?php

namespace App\Models;

use App\Enums\NewsletterCampaignStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'subject',
    'preview_text',
    'content',
    'status',
    'recipient_count',
    'sent_count',
    'failed_count',
    'queued_at',
    'started_at',
    'sent_at',
    'failed_at',
    'cancelled_at',
])]
class NewsletterCampaign extends Model
{
    protected function casts(): array
    {
        return [
            'status' => NewsletterCampaignStatus::class,
            'recipient_count' => 'integer',
            'sent_count' => 'integer',
            'failed_count' => 'integer',
            'queued_at' => 'datetime',
            'started_at' => 'datetime',
            'sent_at' => 'datetime',
            'failed_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }

    public function recipients(): HasMany
    {
        return $this->hasMany(NewsletterCampaignRecipient::class);
    }

    public function canBeQueued(): bool
    {
        return in_array($this->status, [
            NewsletterCampaignStatus::Draft,
            NewsletterCampaignStatus::Failed,
            NewsletterCampaignStatus::Cancelled,
        ], true);
    }
}
