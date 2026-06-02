<?php

namespace App\Mail;

use App\Models\NewsletterSubscriber;
use App\Support\Newsletter;
use App\Support\NewsletterContent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public NewsletterSubscriber $subscriber) {}

    public function envelope(): Envelope
    {
        $settings = Newsletter::settings();

        return new Envelope(
            subject: html_entity_decode(strip_tags(NewsletterContent::render(
                $settings->confirmation_email_subject,
                $this->subscriber,
                urls: ['confirmation_url' => Newsletter::confirmationUrl($this->subscriber)],
            ))),
        );
    }

    public function content(): Content
    {
        $settings = Newsletter::settings();

        return new Content(
            view: 'mail.newsletter-confirmation',
            with: [
                'body' => NewsletterContent::render(
                    $settings->confirmation_email_body,
                    $this->subscriber,
                    urls: ['confirmation_url' => Newsletter::confirmationUrl($this->subscriber)],
                ),
            ],
        );
    }

    /**
     * @return array<int, mixed>
     */
    public function attachments(): array
    {
        return [];
    }
}
