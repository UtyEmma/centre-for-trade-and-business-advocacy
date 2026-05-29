<?php

namespace App\Actions\ContactMessages;

use App\Enums\ContactMessageResponseStatus;
use App\Enums\ContactMessageStatus;
use App\Mail\ContactMessageResponseMail;
use App\Models\ContactMessageResponse;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class SendContactMessageResponse
{
    public function handle(ContactMessageResponse $response, ?User $responder = null): ContactMessageResponse
    {
        if ($response->status === ContactMessageResponseStatus::Sent) {
            return $response;
        }

        $response->loadMissing('contactMessage');

        Mail::to($response->contactMessage->email, $response->contactMessage->name)
            ->send(new ContactMessageResponseMail($response));

        $response->forceFill([
            'user_id' => $responder?->getKey() ?? $response->user_id,
            'status' => ContactMessageResponseStatus::Sent,
            'sent_at' => now(),
        ])->save();

        $response->contactMessage->forceFill([
            'status' => ContactMessageStatus::Responded,
            'responded_at' => $response->sent_at,
        ])->save();

        return $response->refresh();
    }
}
