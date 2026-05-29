<?php

namespace App\Models;

use App\Enums\ContactMessageResponseStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'contact_message_id',
    'user_id',
    'subject',
    'response',
    'status',
    'sent_at',
])]
class ContactMessageResponse extends Model
{
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'status' => ContactMessageResponseStatus::class,
            'sent_at' => 'datetime',
        ];
    }

    public function contactMessage(): BelongsTo
    {
        return $this->belongsTo(ContactMessage::class);
    }

    public function respondedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
