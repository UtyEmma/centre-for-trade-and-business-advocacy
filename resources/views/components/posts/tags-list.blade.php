@props([
    'tags' => collect()
])

@if ($tags->isNotEmpty())
    <div class="tp-sidebar-widget mb-45">
        <div class="tp-sidebar-widget-bg tp-sidebar-widget-category">
            <h3 class="tp-sidebar-widget-title">Our tag</h3>
            <div class="tagcloud">
                @forelse ($tags as $tag)
                    <a class="capitalize" href="{{ route('blog', ['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endif