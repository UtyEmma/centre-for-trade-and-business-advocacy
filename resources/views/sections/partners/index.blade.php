@props([
    'headline' => "Our Partners",
    'partners' => collect()
])

@if ($partners->isNotEmpty())
    <div class="tp-fi-brand-ptb tp-sec-line tp-sec-ptb pt-10! pb-80">
        <div class="container col-lg-10 mx-auto">
            <div class="tp-fi-brand-top mb-10!">
                <h3 class="tp-section-title font-medium! md:text-2xl! max-md:text-xl!" data-text-split data-letters-fade-in>{{$headline}}</h3>
            </div>
            <div class="tp-fi-brand-wrapper">
                <div class="tp-fi-brand-slider">
                    <div class="swiper tp-brand-slider-active">
                        <div class="swiper-wrapper">
                            @forelse ($partners as $partner)
                                <div class="swiper-slide">
                                    <div class="tp-fi-brand-slider-item" title="{{ $partner->name }}" >
                                        <a href="{{ $partner->website_url }}" >
                                            <img src="{{ $partner->image }}" class="h-10 object-contain" />
                                        </a>
                                    </div>
                                </div>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif