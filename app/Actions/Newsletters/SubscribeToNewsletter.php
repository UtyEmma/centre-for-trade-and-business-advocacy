<?php

namespace App\Actions\Newsletters;

use App\Enums\NewsletterSubscriberStatus;
use App\Models\NewsletterSubscriber;
use App\Support\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubscribeToNewsletter
{
    /**
     * @return array{subscriber: NewsletterSubscriber, result: string}
     */
    public function handle(string $email, ?string $name = null, string $source = 'footer', ?Request $request = null): array
    {
        $email = Str::lower(trim($email));
        $name = filled($name) ? trim((string) $name) : null;
        $settings = Newsletter::settings();

        $subscriber = NewsletterSubscriber::query()
            ->where('email', $email)
            ->first();

        if ($subscriber?->status === NewsletterSubscriberStatus::Active) {
            return [
                'subscriber' => $subscriber,
                'result' => 'already_active',
            ];
        }

        $subscriber ??= new NewsletterSubscriber(['email' => $email]);

        $subscriber->forceFill([
            'name' => $name ?? $subscriber->name,
            'source' => $source,
            'ip_address' => $request?->ip(),
            'user_agent' => $request?->userAgent(),
        ]);

        if ($settings->double_opt_in_enabled) {
            $subscriber->forceFill([
                'status' => NewsletterSubscriberStatus::Pending,
                'confirmed_at' => null,
                'unsubscribed_at' => null,
            ])->save();

            app(SendNewsletterConfirmation::class)->handle($subscriber);

            return [
                'subscriber' => $subscriber->refresh(),
                'result' => 'confirmation_sent',
            ];
        }

        $subscriber->forceFill([
            'status' => NewsletterSubscriberStatus::Active,
            'subscribed_at' => $subscriber->subscribed_at ?? now(),
            'confirmed_at' => $subscriber->confirmed_at ?? now(),
            'unsubscribed_at' => null,
        ])->save();

        return [
            'subscriber' => $subscriber->refresh(),
            'result' => 'subscribed',
        ];
    }
}
