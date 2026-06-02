<?php

namespace App\Models;

use App\Enums\NewsletterCampaignRecipientStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'newsletter_campaign_id',
    'newsletter_subscriber_id',
    'email',
    'name',
    'status',
    'failure_reason',
    'sent_at',
    'failed_at',
])]
class NewsletterCampaignRecipient extends Model
{
    protected function casts(): array
    {
        return [
            'status' => NewsletterCampaignRecipientStatus::class,
            'sent_at' => 'datetime',
            'failed_at' => 'datetime',
        ];
    }

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(NewsletterCampaign::class, 'newsletter_campaign_id');
    }

    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(NewsletterSubscriber::class, 'newsletter_subscriber_id');
    }
}
