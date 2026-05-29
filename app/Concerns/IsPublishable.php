<?php
namespace App\Concerns;

use App\Enums\CaseStudyStatus;
use App\Enums\PostStatus;
use Illuminate\Database\Eloquent\Builder;

trait IsPublishable {

    public static function bootIsPublishable() {
        if(!request()->is('admin/*')) {
            static::addGlobalScope('published', fn($query) => $query->published());
        }
    }

    function scopePublished(Builder $query){
        if($this->hasAttribute('is_published')) {
            $query->where('is_published', true);
        }

        if($this->hasAttribute('status')) {
            $query->whereIn('status', $this->publishStatus());
        }

        if($this->hasAttribute('published_at')) {
            $query->where('published_at', '<=', now());
        }
    }

    function scopeUnPublished(Builder $query) {
        return $query->withoutGlobalScope('published')
                    ->where('is_published', false);
    }

    function publish(){
        $this->update(['is_published' => true]);
    }

    function unpublish(){
        $this->update([ 'is_published' => false ]);
    }

}