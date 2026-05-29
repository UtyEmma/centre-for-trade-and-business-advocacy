<?php

use App\Http\Resources\Posts\PostResource;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Service;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component {
    
    #[Computed]
    function services() {
        return Service::featured()->published()->limit(6)->get();
    }

    #[Computed]
    function posts(){
        $posts = Post::with(['category', 'author'])->featured()->published()->get();
        return $posts;
    }

    #[Computed]
    function faqs() {
        return Faq::all();
    }

};