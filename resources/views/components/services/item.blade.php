<div class="tp-fi-service-item text-center mb-30 tp-fade-anim flex flex-col h-full" data-delay=".2">
    <div class="tp-fi-service-item-icon">
        <span>
            @svg($service->icon, 'size-12 text-gray-600')
        </span>
    </div>
    <div class="tp-fi-service-item-content flex-1">
        <h3 class="tp-fi-service-item-title">
            <a class="tp-line-anim" href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
        </h3>

        <p class="line-clamp-3! text-gray-600">{{$service->summary}}</p>
    </div>
    <div class="tp-fi-service-item-btn">
        <a href="{{ route('services.show', $service) }}">
            <span>Read more</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path d="M0.75 6.75H12.75M12.75 6.75L6.75 0.75M12.75 6.75L6.75 12.75" stroke="currentColor"
                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </a>
    </div>
</div>