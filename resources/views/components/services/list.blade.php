<div class="tp-success-item p-relative group">
    <div class="tp-success-item-icon left-[58.33333333%]!">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M0.75 6.75H12.75M12.75 6.75L6.75 0.75M12.75 6.75L6.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </span>
    </div>
    <div class="row gx-0">
        <div class="col-md-7">
            <div class="tp-success-item-content h-96!  justify-between pe-5!">
                <div class="">
                    @svg($service->icon, 'size-7 text-primary! group-hover:text-white/80! group-active:text-white/80!')
                </div>

                <div class="tp-success-item-bottom">
                    <h3 class="tp-success-item-title mb-2">
                        <a class="tp-line-anim leading-normal" href="{{ route('services.show', $service) }}">{{$service->title}}</a>
                    </h3>

                    <p class="line-clamp-3! mb-5! text-gray-500! group-hover:text-white/80! group-active:text-white/80!">{{$service->summary}}</p>

                    <div class="tp-cn-service-item-btn mb-0!">
                        <x-button as="a"  href="{{ route('services.show', $service) }}" variant="outline">Read More</x-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="tp-success-item-thumb h-full! fix">
                <a href="{{ route('services', $service) }}">
                    <img loading="lazy" class="radius-6 h-full! object-cover"  src="{{ $service->image }}" alt="" />
                </a>
            </div>
        </div>
    </div>
</div>