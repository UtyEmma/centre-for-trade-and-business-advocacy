<?php

namespace App\Actions\Newsletters;

use App\Mail\NewsletterConfirmationMail;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class SendNewsletterConfirmation
{
    public function handle(NewsletterSubscriber $subscriber): void
    {
        Mail::to($subscriber->email, $subscriber->name)
            ->send(new NewsletterConfirmationMail($subscriber));

        $subscriber->forceFill([
            'confirmation_sent_at' => now(),
        ])->save();
    }
}
