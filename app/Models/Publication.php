<?php

namespace App\Models;

use App\Concerns\IsPublishable;
use App\Concerns\IsSortable;
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
    'publication_type_id',
    'service_id',
    'title',
    'slug',
    'summary',
    'publication_year',
    'published_at',
    'external_url',
    'sort_order',
    'is_featured',
    'is_published',
])]
class Publication extends Model implements HasMedia
{
    use HasFactory, HasSlug, InteractsWithMedia, SoftDeletes, IsPublishable, IsSortable;

    public static function booted() {
        if(!request()->is('admin/*')) {
            static::addGlobalScope('active', fn($query) => $query->whereRelation('publicationType', 'is_active', true));
        }
    }

    protected function casts(): array
    {
        return [
            'publication_year' => 'integer',
            'published_at' => 'date',
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

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('document')->singleFile();
        $this->addMediaCollection('cover_image')->singleFile();
    }

    public function publicationType(): BelongsTo
    {
        return $this->belongsTo(PublicationType::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    function getImageAttribute(){
        return $this->getFirstMediaUrl('cover_image');
    }

    function getDocumentAttribute(){
        return $this->getFirstMediaUrl('document');
    }

    function getDocumentUrlAttribute(){
        if($this->document) return $this->document;
        return $this->external_url;
    }
}
