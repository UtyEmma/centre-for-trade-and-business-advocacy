<?php

namespace App\Models;

use App\Enums\CommentStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'commentable_type',
    'commentable_id',
    'comment_id',
    'user_id',
    'name',
    'email',
    'website_url',
    'comment',
    'status',
    'approved_at',
])]
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected function casts(): array
    {
        return [
            'status' => CommentStatus::class,
            'approved_at' => 'datetime',
        ];
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'comment_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(self::class, 'comment_id');
    }
}
