<?php

namespace App\Mail;

use App\Models\NewsletterCampaignRecipient;
use App\Support\Newsletter;
use App\Support\NewsletterContent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterCampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public NewsletterCampaignRecipient $recipient) {}

    public function envelope(): Envelope
    {
        $this->recipient->loadMissing(['campaign', 'subscriber']);

        return new Envelope(
            subject: html_entity_decode(strip_tags(NewsletterContent::render(
                $this->recipient->campaign->subject,
                $this->recipient->subscriber,
                $this->recipient->campaign,
                ['unsubscribe_url' => Newsletter::unsubscribeUrl($this->recipient->subscriber)],
            ))),
        );
    }

    public function content(): Content
    {
        $this->recipient->loadMissing(['campaign', 'subscriber']);
        $settings = Newsletter::settings();
        $urls = [
            'unsubscribe_url' => Newsletter::unsubscribeUrl($this->recipient->subscriber),
        ];

        return new Content(
            view: 'mail.newsletter-campaign',
            with: [
                'recipient' => $this->recipient,
                'previewText' => NewsletterContent::render($this->recipient->campaign->preview_text, $this->recipient->subscriber, $this->recipient->campaign, $urls),
                'body' => NewsletterContent::render($this->recipient->campaign->content, $this->recipient->subscriber, $this->recipient->campaign, $urls),
                'footer' => NewsletterContent::render($settings->campaign_footer, $this->recipient->subscriber, $this->recipient->campaign, $urls),
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
