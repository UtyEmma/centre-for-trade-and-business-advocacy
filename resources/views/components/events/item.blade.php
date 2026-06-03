<div class="tp-blog-item p-relative">
    <div class="tp-blog-item-img mb-20 p-relative">
        <a href="{{ route('events.show', $event) }}">
            <img loading="lazy" class="radius-6 h-52! object-cover" src="{{ $event->image }}" alt="">
        </a>
    </div>
    <div class="tp-blog-item-content">
        <div class="tp-blog-item-meta mb-0!">
            <div >
                <p class="text-xs! uppercase inline-block font-semibold! mb-3! leading-none! p-1 px-2 rounded border">{{ $event->event_status }}</p>
                <p class="text-sm! font-medium! mb-0! leading-none!">{{ $event->day }} &bull; {{ $event->time }}</p>
            </div>
            <h2 class="tp-blog-item-title m-0! leading-none!">
                <a class="tp-line-anim text-xl! leading-none font-medium!" href="{{ route('events.show', $event) }}">{{ $event->title }}</a>
            </h2>
            <p class="text-sm!">{{ $event->event_location }}</p>
        </div>

        <div>

            {{-- <p>{{$event->summary}}</p> --}}
        </div>
    </div>
</div>