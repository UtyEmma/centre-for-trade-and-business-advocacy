<?php

namespace App\Support;

use App\Models\NewsletterCampaign;
use App\Models\NewsletterSubscriber;

final class NewsletterContent
{
    public const string Variables = '{{ subscriber.name }}, {{ subscriber.email }}, {{ site.name }}, {{ confirmation_url }}, {{ unsubscribe_url }}, {{ campaign.subject }}, {{ campaign.preview_text }}, {{ current_year }}';

    /**
     * @param  array{confirmation_url?: string|null, unsubscribe_url?: string|null}  $urls
     */
    public static function render(?string $content, ?NewsletterSubscriber $subscriber = null, ?NewsletterCampaign $campaign = null, array $urls = []): string
    {
        $values = [
            'subscriber.name' => $subscriber?->name ?? '',
            'subscriber.email' => $subscriber?->email ?? '',
            'site.name' => Site::name(),
            'confirmation_url' => $urls['confirmation_url'] ?? '',
            'unsubscribe_url' => $urls['unsubscribe_url'] ?? '',
            'campaign.subject' => $campaign?->subject ?? '',
            'campaign.preview_text' => $campaign?->preview_text ?? '',
            'current_year' => now()->format('Y'),
        ];

        $tokens = [];

        foreach ($values as $key => $value) {
            $escapedValue = e((string) $value);

            $tokens["{{ {$key} }}"] = $escapedValue;
            $tokens["{{{$key}}}"] = $escapedValue;
        }

        return strtr((string) $content, $tokens);
    }
}
