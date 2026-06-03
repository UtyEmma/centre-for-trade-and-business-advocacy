@props([
    'posts' => collect(),
    'title' => 'Recent Posts'
])

@if ($posts->isNotEmpty())
    <div class="tp-sidebar-widget mb-45">
        <div class="tp-sidebar-widget-bg tp-sidebar-widget-category">
            <h3 class="tp-sidebar-widget-title">{{ $title }}</h3>
            <div class="rc-post-wrap flex  flex-col gap-3">
                @forelse ($posts as $post)
                    <div class="rc-post-item border-b-0! d-flex gap-1! align-items-center">
                        <div class="rc-post-thumb me-2 w-1/4 ">
                            <a href="{{ route('blog.show', $post) }}">
                                <img loading="lazy" src="{{ $post->image }}" class="object-cover aspect-square" alt="{{ $post->title }}">
                            </a>
                        </div>
                        <div class="rc-post-content">
                            <div class="rc-post-meta capitalize mb-0!">
                                <span class="capitalize!">{{ $post->date }}</span>
                            </div>
                            <h3 class="rc-post-title">
                                <a class="tp-line-anim text-lg" href="{{ route('blog.show', $post) }}">Freelancer Days 2026, <br> What’s new?</a>
                            </h3>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endif
