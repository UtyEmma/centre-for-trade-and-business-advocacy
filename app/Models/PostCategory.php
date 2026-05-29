<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable([
    'name',
    'slug',
    'description',
    'sort_order',
    'is_active',
])]
class PostCategory extends Model
{
    use HasFactory, HasSlug;

    protected $withCount = ['posts'];

    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_active' => 'boolean',
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

    function scopeIsActive(Builder $query) {
        $query->whereIsActive(true);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
