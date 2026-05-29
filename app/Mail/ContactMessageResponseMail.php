<?php

namespace App\Mail;

use App\Models\ContactMessageResponse;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMessageResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ContactMessageResponse $response) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->response->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-message-response',
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
