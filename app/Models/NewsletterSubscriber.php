<?php

namespace App\Models;

use App\Enums\NewsletterSubscriberStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'email',
    'status',
    'source',
    'subscribed_at',
    'confirmed_at',
    'confirmation_sent_at',
    'unsubscribed_at',
    'ip_address',
    'user_agent',
])]
class NewsletterSubscriber extends Model
{
    protected function casts(): array
    {
        return [
            'status' => NewsletterSubscriberStatus::class,
            'subscribed_at' => 'datetime',
            'confirmed_at' => 'datetime',
            'confirmation_sent_at' => 'datetime',
            'unsubscribed_at' => 'datetime',
        ];
    }

    public function campaignRecipients(): HasMany
    {
        return $this->hasMany(NewsletterCampaignRecipient::class);
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', NewsletterSubscriberStatus::Active->value);
    }

    public function scopePending(Builder $query): Builder
    {
        return $query->where('status', NewsletterSubscriberStatus::Pending->value);
    }

    public function activate(): void
    {
        $this->forceFill([
            'status' => NewsletterSubscriberStatus::Active,
            'subscribed_at' => $this->subscribed_at ?? now(),
            'confirmed_at' => $this->confirmed_at ?? now(),
            'unsubscribed_at' => null,
        ])->save();
    }

    public function unsubscribe(): void
    {
        $this->forceFill([
            'status' => NewsletterSubscriberStatus::Unsubscribed,
            'unsubscribed_at' => now(),
        ])->save();
    }
}
