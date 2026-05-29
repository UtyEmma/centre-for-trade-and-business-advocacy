<div class="tp-blog-item p-relative mb-60 pb-50">
    <div class="tp-blog-item-img mb-20 p-relative">
        <a href="{{ route('events.show', $event) }}">
            <img class="radius-6" src="{{ $event->image }}" alt="">
            <div class="tp-blog-item-icon bg-primary text-white p-10 aspect-square! rounded-full flex flex-column align-items-center justify-content-center">
                <p class="text-2xl!">{{ $event->start_at->format('d') }}</span>
                <p class="text-2xl!">{{ $event->start_at->format('M') }}</span>
            </div>
        </a>
    </div>
    <div class="tp-blog-item-content">
        <div class="tp-blog-item-meta mb-10">
        <span>{{ $event->start_at->format('jS F') }} - {{ $event->eventType?->name }}</span>
        </div>
        <h2 class="tp-blog-item-title m-0">
            <a class="tp-line-anim" href="{{ route('events.show', $event) }}">{{ $event->title }}</a>
        </h2>
    </div>
</div>