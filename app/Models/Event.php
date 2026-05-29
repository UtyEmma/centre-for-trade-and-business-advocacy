<?php

namespace App\Models;

use App\Concerns\IsPublishable;
use App\Enums\EventStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable([
    'event_type_id',
    'service_id',
    'title',
    'slug',
    'summary',
    'description',
    'format',
    'venue',
    'location',
    'online_url',
    'start_at',
    'end_at',
    'registration_deadline',
    'external_registration_url',
    'capacity',
    'status',
    'sort_order',
    'is_featured',
    'is_published',
])]
class Event extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, IsPublishable, SoftDeletes;

    public function publishStatus () {
        return [
            EventStatus::Open,
            EventStatus::Scheduled,
            EventStatus::Completed,
            EventStatus::Closed
        ];
    }

    protected function casts(): array
    {
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime',
            'registration_deadline' => 'datetime',
            'capacity' => 'integer',
            'status' => EventStatus::class,
            'sort_order' => 'integer',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('featured_image')->singleFile();
        $this->addMediaCollection('banner')->singleFile();
    }

    public function eventType(): BelongsTo
    {
        return $this->belongsTo(EventType::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }

    function getDateAttribute(){
        return $this->start_at->format('jS F');
    }

    function getImageAttribute() {
        return $this->getFirstMediaUrl('featured_image');
    }
}
