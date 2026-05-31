<?php

use App\Http\Resources\Posts\PostResource;
use App\Models\Faq;
use App\Models\Post;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
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
        return Faq::featured()->get();
    }

    #[Computed]
    function teamMembers() {
        return TeamMember::limit(4)->get();
    }

    #[Computed]
    function testimonials(){
        return Testimonial::featured()->get();
    }

};