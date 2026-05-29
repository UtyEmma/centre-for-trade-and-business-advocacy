<?php

namespace App\Models;

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
    'partner_type_id',
    'name',
    'slug',
    'website_url',
    'description',
    'is_featured',
    'is_published',
    'sort_order',
])]
class Partner extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, SoftDeletes;

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')->singleFile();
    }

    public function partnerType(): BelongsTo
    {
        return $this->belongsTo(PartnerType::class);
    }
}
