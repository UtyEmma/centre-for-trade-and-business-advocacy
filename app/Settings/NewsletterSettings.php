<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class NewsletterSettings extends Settings
{
    public bool $double_opt_in_enabled = false;

    public string $signup_success_message = 'Thank you for subscribing to our newsletter.';

    public string $already_subscribed_message = 'You are already subscribed to our newsletter.';

    public string $confirmation_sent_message = 'Please check your email to confirm your newsletter subscription.';

    public string $confirmation_success_message = 'Your newsletter subscription has been confirmed.';

    public string $unsubscribe_success_message = 'You have been unsubscribed from our newsletter.';

    public string $confirmation_email_subject = 'Confirm your newsletter subscription';

    public string $confirmation_email_body = '<p>Hello {{ subscriber.name }},</p><p>Please confirm your newsletter subscription to {{ site.name }} by clicking the link below:</p><p><a href="{{ confirmation_url }}">Confirm subscription</a></p>';

    public string $campaign_footer = '<p>You are receiving this email because you subscribed to {{ site.name }} updates.</p><p><a href="{{ unsubscribe_url }}">Unsubscribe</a></p>';

    public static function group(): string
    {
        return 'newsletter';
    }

    public static function defaults(): array
    {
        return [
            'double_opt_in_enabled' => false,
            'signup_success_message' => 'Thank you for subscribing to our newsletter.',
            'already_subscribed_message' => 'You are already subscribed to our newsletter.',
            'confirmation_sent_message' => 'Please check your email to confirm your newsletter subscription.',
            'confirmation_success_message' => 'Your newsletter subscription has been confirmed.',
            'unsubscribe_success_message' => 'You have been unsubscribed from our newsletter.',
            'confirmation_email_subject' => 'Confirm your newsletter subscription',
            'confirmation_email_body' => '<p>Hello {{ subscriber.name }},</p><p>Please confirm your newsletter subscription to {{ site.name }} by clicking the link below:</p><p><a href="{{ confirmation_url }}">Confirm subscription</a></p>',
            'campaign_footer' => '<p>You are receiving this email because you subscribed to {{ site.name }} updates.</p><p><a href="{{ unsubscribe_url }}">Unsubscribe</a></p>',
        ];
    }
}
