<?php

namespace App\Models;

use App\Enums\ContactMessageStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'name',
    'email',
    'phone',
    'organization',
    'subject',
    'message',
    'status',
    'admin_notes',
    'responded_at',
])]
class ContactMessage extends Model
{
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'status' => ContactMessageStatus::class,
            'responded_at' => 'datetime',
        ];
    }

    public function responses(): HasMany
    {
        return $this->hasMany(ContactMessageResponse::class);
    }
}
