<div class="tp-cc-blog-item mb-30 p-relative tp-fade-anim">
    <div class="tp-cc-blog-item-thumb radius-6">
        <a href="{{ route('blog.show', $post) }}">
            <img loading="lazy" class="radius-6 h-64! w-full object-cover" src="{{ $post->image }}" alt="{{ $post->title }}">
        </a>
    </div>
    
    <div class="tp-cn-blog-item bg-white">
        @if ($post->category)
            <div class="tp-cn-blog-item-meta">
                <span class="category">{{ $post->category->name }}</span>
            </div>
        @endif
        <h3 class="tp-cn-blog-item-title line-clamp-2">
            <a class="tp-line-anim" href={{ route('blog.show', $post) }}">{{$post->title}}</a>
        </h3>
        <p class="description line-clamp-3">
            {{$post->excerpt}}
        </p>
    </div>
</div>