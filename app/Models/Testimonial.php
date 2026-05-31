<?php

namespace App\Models;

use App\Concerns\IsFeaturable;
use App\Concerns\IsPublishable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[Fillable([
    'name',
    'role',
    'organization',
    'location',
    'quote',
    'rating',
    'website_url',
    'sort_order',
    'is_featured',
    'is_published',
])]
class Testimonial extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, IsPublishable, IsFeaturable, SoftDeletes;

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'sort_order' => 'integer',
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_photo')->singleFile();
        $this->addMediaCollection('logo')->singleFile();
    }

    function getImageAttribute() {
        return $this->getFirstMediaUrl('profile_photo');
    }

    function getLogoAttribute(){
        return $this->getFirstMediaUrl('logo');
    }
}
