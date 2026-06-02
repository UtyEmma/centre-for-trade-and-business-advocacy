<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use App\Support\Newsletter;
use Illuminate\Contracts\View\View;

class NewsletterSubscriptionController
{
    public function confirm(NewsletterSubscriber $subscriber): View
    {
        $subscriber->activate();

        return view('newsletter.status', [
            'title' => 'Subscription confirmed',
            'message' => Newsletter::settings()->confirmation_success_message,
        ]);
    }

    public function unsubscribe(NewsletterSubscriber $subscriber): View
    {
        $subscriber->unsubscribe();

        return view('newsletter.status', [
            'title' => 'Unsubscribed',
            'message' => Newsletter::settings()->unsubscribe_success_message,
        ]);
    }
}
