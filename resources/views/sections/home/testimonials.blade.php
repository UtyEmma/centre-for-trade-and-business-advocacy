@props([
    'label' => 'Trusted by organizations across Africa',
    'testimonials' => collect()
])

@if($testimonials->isNotEmpty())
    <div class="tp-fi-testimonial-ptb tp-sec-ptb pt-130 pb-130" data-bg-color="#F7F7F5">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-fi-testimonial-heading mb-30">
                        <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                    </div>
                    <div class="tp-fi-testimonial-slider-text pb-110">
                        <div class="swiper tp-testimonial-content-active">
                            <div class="swiper-wrapper">
                                @forelse ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <h3 class="tp-fi-testimonial-title">
                                            {{ $testimonial->quote }}
                                        </h3>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="tp-fi-testimonial-author-wrap">
                        <div class="swiper tp-testimonial-bottom-author-active">
                            <div class="swiper-wrapper">
                                @forelse ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="tp-fi-testimonial-quote d-flex align-items-center">
                                            <div class="tp-fi-testimonial-quote-icon">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20"
                                                        viewBox="0 0 28 20" fill="none">
                                                        <path
                                                            d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                                            fill="currentColor" />
                                                        <path
                                                            d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                                            fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="tp-fi-testimonial-quote-content">
                                                <span>{{ $testimonial->name }}</span>
                                                <p>{{ $testimonial->role }} - {{$testimonial->organization}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="tp-fi-testimonial-slider-wrap">
                        <div class="swiper tp-testimonial-bottom-thumb-active">
                            <div class="swiper-wrapper">
                                @forelse ($testimonials as $testimonial)
                                    <div class="swiper-slide">
                                        <div class="tp-fi-testimonial-slider-thumb">
                                            <img src="{{ $testimonial->image }}" class="aspect-square! object-cover" alt="{{ $testimonial->name }}">
                                        </div>
                                    </div>
                                @empty
                                    
                                @endforelse
                            </div>
                        </div>
                        <div class="tp-fi-testimonial-navigation">
                            <span class="tp-testimonial-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none">
                                    <path d="M1 9H17M17 9L9 1M17 9L9 17" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif