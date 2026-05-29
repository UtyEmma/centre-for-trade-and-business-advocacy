<?php

namespace App\Models;

use App\Concerns\IsFeaturable;
use App\Concerns\IsPublishable;
use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

#[Fillable([
    'post_category_id',
    'user_id',
    'title',
    'slug',
    'excerpt',
    'content',
    'status',
    'published_at',
    'allow_comments',
    'is_featured',
    'tags',
])]
class Post extends Model implements HasMedia
{
    use HasFactory, HasSlug, HasTags, InteractsWithMedia, SoftDeletes, IsFeaturable, IsPublishable;

    protected $with = ['category', 'author'];

    public function publishStatus () {
        return [
            PostStatus::Published
        ];
    }

    protected function casts(): array {
        return [
            'status' => PostStatus::class,
            'published_at' => 'datetime',
            'allow_comments' => 'boolean',
            'is_featured' => 'boolean',
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

    public function registerMediaCollections(): void {
        $this->addMediaCollection('featured_image')->singleFile();
    }

    function scopeWithFilter(Builder $query, $data){
        if(isset($data['category']) && !empty($data['category'])) {
            $query->whereRelation('category', 'name', 'LIKE', "%{$data['category']}%");
        }

        if(isset($data['search']) && !empty($data['search'])) {
            $query->where('title', 'LIKE', "%{$data['search']}%")
                ->orWhereRelation('category', 'name', 'LIKE', "%{$data['search']}%");
        }

        if(isset($data['author']) && !empty($data['author'])) {
            $query->orWhereRelation('author', 'name', 'LIKE', "%{$data['author']}%");
        }
    }

    function getImageAttribute(){
        return $this->getFirstMediaUrl('featured_image');
    }

    public function category(): BelongsTo {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): MorphMany {
        return $this->morphMany(Comment::class, 'commentable');
    }

    function getDateAttribute(){
        return $this->published_at->format('jS F Y');
    }

    public function scopeOrdered(Builder $query): Builder {
        return $query->orderByDesc('published_at')->orderByDesc('created_at');
    }
}
