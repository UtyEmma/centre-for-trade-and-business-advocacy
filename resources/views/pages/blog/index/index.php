<?php

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Spatie\Tags\Tag;

new class extends Component
{

    #[Url()]
    public $search = '';

    #[Url()]
    public $category = '';
    
    #[Url()]
    public $author = '';
    
    #[Computed()]
    function posts(){
        return Post::withFilter($this->only(['search', 'category', 'author']))->published()->paginate();
    }

    #[Computed]
    function categories() {
        return PostCategory::isActive()->limit(5)->get();
    }

    #[Computed]
    function tags() {
        return Tag::query()->orderBy('name')->limit(12)->get();
    }

    #[Computed]
    function recentPosts() {
        return Post::query()->published()->ordered()->limit(3)->get();
    }
};