@props([
    'headline' => 'We are advancing trade and business reform through evidence, institutions, and stakeholder trust',
    'cta' => [
        'label' => 'See how we work',
        'url' => route('about'),
    ],
    'stakeholders' => [
        'Government Institutions',
        'Private Sector Actors',
        'Civil Society Organizations',
        'Researchers & Academia',
        'Development Partners',
    ],
])

<div class="tp-fi-brand-ptb tp-sec-line tp-sec-ptb pt-130 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="tp-fi-brand-top text-center pb-70">
                        <h3 class="tp-section-title mb-20" data-text-split data-letters-fade-in>{{$headline}}</h3>
                        <div class="tp-fade-anim" data-delay=".3">
                            <a class="tp-btn-underline text-primary!" href="{{ $cta['url'] }}">{{ $cta['label'] }}</a>
                        </div>
                    </div>
                    <div class="tp-fi-brand-wrapper">
                        <div class="tp-fi-brand-slider">
                            <div class="swiper tp-brand-slider-active">
                                <div class="swiper-wrapper">
                                    @forelse ($stakeholders as $stakeholder)
                                        <div class="swiper-slide">
                                            <div class="tp-fi-brand-slider-item">
                                                <p class="font-medium! text-nowrap">{{ $stakeholder }}</p>
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
        </div>
    </div>