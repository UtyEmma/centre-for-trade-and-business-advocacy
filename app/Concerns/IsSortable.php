<?php

namespace App\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Spatie\EloquentSortable\SortableTrait;

trait IsSortable {
    use SortableTrait;

    static function bootIsSortable() {
        if(!request()->is('admin/*')) {
            static::addGlobalScope('ordered', function(Builder $query) {
                return $query->orderBy('sort_order')->orderBy('created_at');
            });
        }
    }

    public $sortable = [
        'order_column_name' => 'sort_order',
        'sort_when_creating' => true,
    ];


    

}