<?php

namespace App\Models;

use App\Concerns\IsPublishable;
use App\Enums\EventStatus;
use App\Support\Seo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
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
    'registrations_enabled',
    'capacity',
    'status',
    'sort_order',
    'is_featured',
    'is_published',
])]
class Event extends Model implements HasMedia
{
    use HasFactory, HasSEO, HasSlug, InteractsWithMedia, IsPublishable, SoftDeletes;

    protected $appends = ['time', 'date', 'event_location', 'day', 'event_status'];

    protected $with = ['media'];

    public function publishStatus()
    {
        return [
            EventStatus::Open,
            EventStatus::Scheduled,
            EventStatus::Completed,
            EventStatus::Closed,
        ];
    }

    protected function casts(): array
    {
        return [
            'start_at' => 'datetime',
            'end_at' => 'datetime',
            'registration_deadline' => 'datetime',
            'registrations_enabled' => 'boolean',
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

    public function getDynamicSEOData(): SEOData
    {
        return Seo::event($this);
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

    public function isPubliclyVisible(): bool
    {
        return ! in_array($this->status, [EventStatus::Draft, EventStatus::Cancelled], true);
    }

    public function acceptsRegistrations(): bool
    {
        return $this->registrations_enabled
            && in_array($this->status, [EventStatus::Open, EventStatus::Scheduled], true)
            && (! $this->registration_deadline || $this->registration_deadline->greaterThanOrEqualTo(now()))
            && (! $this->end_at || $this->end_at->greaterThanOrEqualTo(now()));
    }

    public function getDateAttribute()
    {
        return $this->start_at?->format('jS F') ?? '';
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('featured_image');
    }

    public function getDayAttribute()
    {
        if (! $this->start_at) {
            return '';
        }

        $format = $this->start_at->year !== now()->year ? 'D, jS M Y' : 'D, jS M';
        $startDay = $this->start_at->format($format);

        if ($this->end_at && ! $this->end_at->isSameDay($this->start_at)) {
            return str($startDay)->append(' - '.$this->end_at->format($format))->toString();
        }

        return $startDay;
    }

    public function getTimeAttribute()
    {
        return $this->start_at?->format('H:i A') ?? '';
    }

    public function getEventLocationAttribute()
    {
        return $this->venue ?? 'Online';
    }

    public function getEventStatusAttribute(): string
    {
        $startsAt = $this->start_at;

        if (! $startsAt) {
            return 'Upcoming';
        }

        $now = now();
        $endsAt = $this->end_at;

        if (
            $endsAt
            && $startsAt->lessThanOrEqualTo($now)
            && $endsAt->greaterThanOrEqualTo($now)
        ) {
            return 'Ongoing';
        }

        if (
            $startsAt->isSameDay($now)
            && (! $endsAt || $endsAt->greaterThanOrEqualTo($now))
        ) {
            return 'Happening Today';
        }

        if ($startsAt->greaterThan($now)) {
            return 'Upcoming';
        }

        return 'Past Event';
    }
}
