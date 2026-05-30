<div class="tp-cn-service-item d-flex align-items-center justify-content-center justify-content-md-between">
    <div class="tp-cn-service-item-content p-0! w-[60%]!">
        <div class="p-10!">
            <div class="tp-cn-service-item-icon mb-2">
                <span>
                    @svg($service->icon, 'size-7 text-[#01373D]')
                </span>
            </div>
            <h4 class="tp-cn-service-item-title mb-2!">
                <a class="tp-line-anim" href="{{ route('services.show', $service) }}">{{ $service->title }}</a>
            </h4>
    
            <p class="line-clamp-3! mb-3!">{{$service->summary}}</p>
            
            <div class="tp-cn-service-item-btn mb-0!">
                <a class="tp-btn tp-btn-border tp-btn-switch-animation" href="{{ route('services.show', $service) }}">
                    <span class="d-flex align-items-center justify-content-center">
                    <span class="btn-text">Read more</span>
                    <i class="btn-icon"></i>
                    <i class="btn-icon"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="tp-cn-service-item-thumb h-full! w-[40%]!">
        <img src="{{ $service->image }}" class="h-full!" alt="">
        {{-- <div class="tp-cn-service-item-thumb-1">
        </div> --}}
    </div>
</div>