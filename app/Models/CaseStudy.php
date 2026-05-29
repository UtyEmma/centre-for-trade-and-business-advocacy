<?php

namespace App\Models;

use App\Concerns\IsPublishable;
use App\Concerns\IsSortable;
use App\Enums\CaseStudyStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable([
    'service_id',
    'title',
    'slug',
    'partner',
    'location',
    'summary',
    'content',
    'start_date',
    'end_date',
    'status',
    'is_featured',
    'is_published',
])]
class CaseStudy extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, SoftDeletes, IsPublishable;

    public function publishStatus() {
        return  [
            CaseStudyStatus::Completed, 
            CaseStudyStatus::Active
        ];
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'status' => CaseStudyStatus::class,
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
        $this->addMediaCollection('gallery');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    function getImageAttribute(){
        return $this->getFirstMediaUrl('featured_image');
    }

    function getGalleryAttribute(){
        return $this->getMedia('gallery')->map(fn($media) => $media->getFullUrl());
    }
}
