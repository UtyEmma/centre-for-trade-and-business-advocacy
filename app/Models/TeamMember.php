<?php

namespace App\Models;

use App\Concerns\IsPublishable;
use App\Concerns\IsSortable;
use App\Support\Seo;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable([
    'team_category_id',
    'name',
    'slug',
    'role',
    'bio',
    'email',
    'linkedin_url',
    'sort_order',
    'is_published',
])]
class TeamMember extends Model implements HasMedia
{
    use HasFactory, HasSEO, HasSlug, InteractsWithMedia, IsPublishable, IsSortable, SoftDeletes;

    protected $appends = ['image'];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_published' => 'boolean',
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

    public function getDynamicSEOData(): SEOData
    {
        return Seo::teamMember($this);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_photo')->singleFile();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TeamCategory::class, 'team_category_id');
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('profile_photo');
    }
}
