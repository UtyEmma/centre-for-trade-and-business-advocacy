<?php
namespace App\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait IsFeaturable {

    public static function bootIsFeatured() {
        if(!request()->is('admin/*')) {
            static::addGlobalScope('is_featured', fn($query) => $query->featured());
        }
    }

    function scopeFeatured(Builder $query){
        $query->where('is_featured', true);
    }
        
    function scopeNotFeatured(Builder $query) {
        $query->where('is_featured', false);        
    }

    function removeAsFeatured(){
        $this->update(['is_featured' => true]);
    }

    function setAsFeatured(){
        $this->update(['is_featured' => false ]);
    }

}