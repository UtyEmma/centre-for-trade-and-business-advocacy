<?php
namespace App\Concerns;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToPages {

    static function bootBelongsToPages() : void {
        if(!request()->is('admin/*')) {
            static::addGlobalScope('page', function(Builder $query){
                $route = request()->route();
                
                $query->whereJsonContains('page', $route->getName())
                    ->orWhereNull('page');
            });
        }
    }

    function scopePage($query, $strict = true){
        $query->withoutGlobalScope('page')
            ->whereJsonContains('page', request()->route()->getName())
            ->when(!$strict, fn($query) => $query->orWhereNull('page'));
    }

}