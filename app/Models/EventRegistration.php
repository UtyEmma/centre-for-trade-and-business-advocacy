<?php

namespace App\Models;

use App\Enums\EventRegistrationStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'event_id',
    'name',
    'email',
    'phone',
    'organization',
    'role',
    'notes',
    'status',
    'registered_at',
    'responded_at',
])]
class EventRegistration extends Model
{
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'status' => EventRegistrationStatus::class,
            'registered_at' => 'datetime',
            'responded_at' => 'datetime',
        ];
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
