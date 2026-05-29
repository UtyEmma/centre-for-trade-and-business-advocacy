<?php

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    
    public Post $post;

    #[Computed]
    function relatedPosts(){
        $query = Post::query();
        return $query->published()
                    ->whereNot('id', $this->post)
                    ->ordered()->limit(3)
                    ->get();
    }
};