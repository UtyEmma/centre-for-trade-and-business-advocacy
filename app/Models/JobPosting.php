<?php

namespace App\Models;

use App\Concerns\IsSortable;
use App\Enums\JobPostingStatus;
use App\Support\Seo;
use Database\Factories\JobPostingFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

#[Fillable([
    'title',
    'slug',
    'department',
    'location',
    'employment_type',
    'workplace_type',
    'summary',
    'description',
    'responsibilities',
    'requirements',
    'benefits',
    'salary_range',
    'application_url',
    'application_email',
    'application_deadline',
    'status',
    'sort_order',
    'is_featured',
    'is_published',
])]
class JobPosting extends Model
{
    /** @use HasFactory<JobPostingFactory> */
    use HasFactory, HasSEO, HasSlug, IsSortable, SoftDeletes;

    protected function casts(): array
    {
        return [
            'application_deadline' => 'datetime',
            'status' => JobPostingStatus::class,
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
        return Seo::jobPosting($this);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }

    public function scopeOpen(Builder $query): Builder
    {
        return $query->where('status', JobPostingStatus::Open->value);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }
}
