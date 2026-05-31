<?php

namespace App\Models;

use App\Concerns\BelongsToPages;
use App\Concerns\IsFeaturable;
use App\Concerns\IsPublishable;
use App\Concerns\IsSortable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'question',
    'answer',
    'page',
    'category',
    'sort_order',
    'is_published',
    'is_featured'
])]
class Faq extends Model
{
    use HasFactory, SoftDeletes, IsSortable, IsPublishable, IsFeaturable, BelongsToPages;

    protected function casts(): array {
        return [
            'sort_order' => 'integer',
            'is_published' => 'boolean',
            'page' => 'array'
        ];
    }

    
}
