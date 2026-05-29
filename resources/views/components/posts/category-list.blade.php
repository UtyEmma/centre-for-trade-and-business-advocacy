@props([
    'categories' => collect()
])

@if ($categories->isNotEmpty())
    <div class="tp-sidebar-widget mb-45">
        <div class="tp-sidebar-widget-bg tp-sidebar-widget-category">
            <h3 class="tp-sidebar-widget-title">Category</h3>
            <ul class="tp-sidebar-widget-category-list">
                @forelse ($categories as $category)
                    <li>
                        <a href="{{ route('blog', ['category' => $category]) }}">
                            {{ $category->name }}
                            <span>({{ $category->posts_count }})</span>
                        </a>
                    </li>
                @empty
                    
                @endforelse
            </ul>
        </div>
    </div>
@endif