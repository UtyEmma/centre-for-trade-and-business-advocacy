<?php

namespace App\Models;

use App\Concerns\IsFeaturable;
use App\Concerns\IsPublishable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable([
    'title',
    'slug',
    'icon',
    'summary',
    'description',
    'sort_order',
    'is_featured',
    'is_published',
])]
class Service extends Model implements HasMedia {
    use HasFactory, HasSlug, InteractsWithMedia, SoftDeletes, IsPublishable, IsFeaturable;

    protected function casts(): array {
        return [
            'sort_order' => 'integer',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function getSlugOptions(): SlugOptions {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function caseStudies(): HasMany
    {
        return $this->hasMany(CaseStudy::class);
    }

    public function publications(): HasMany
    {
        return $this->hasMany(Publication::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class);
    }
}
