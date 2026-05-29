@if ($services->isNotEmpty())
    <div class="tp-fi-service-ptb tp-sec-ptb pt-130 pb-110">
        <div class="container col-md-10 mx-auto">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="tp-fi-service-heading mb-60">
                        <span class="tp-section-sub tp-fade-anim">What we provide</span>
                        <h3 class="tp-section-title" data-text-split data-letters-fade-in>Powering the complete
                            landscape
                            <br>
                            of global financial
                            services
                        </h3>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tp-fi-service-right text-lg-end mb-60 tp-fade-anim">
                        <a href="{{ route('services') }}" class="tp-btn-event">
                            <div class="button-text">Learn more</div>
                            <div class="button-icon-wrapper">
                                <img src="assets/img/finance/hero/btn-arrow.svg" loading="lazy" width="16" height="16"
                                    alt="" class="button-image">
                                <div class="button-dot"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row g-3">
                @forelse ($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <x-services.item :service="$service" />
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endif