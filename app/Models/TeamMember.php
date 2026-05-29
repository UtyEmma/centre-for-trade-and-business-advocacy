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
    use HasFactory, HasSlug, InteractsWithMedia, SoftDeletes, IsPublishable, IsSortable;

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

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_photo')->singleFile();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(TeamCategory::class, 'team_category_id');
    }

    function getImageAttribute(){
        return $this->getFirstMediaUrl('profile_photo');
    }
}
