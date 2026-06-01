@props([
    'items' => ['Trade & Competitiveness Reform', 'MSME Policy Support', 'Competition & Consumer Protection', 'Crowdfunding Framework Dialogue', 'Multi-Stakeholder Policy Platforms']
])

<div class="tp-fi-text-ptb pt-20 pb-20 bg-primary">
        <div class="tp-fi-text-slider-wrapper">
            <div class="swiper tp-text-slider-active">
                <div class="swiper-wrapper tp-slide-transtion">
                    @forelse ($items as $item)
                        <div class="swiper-slide">
                            <div class="tp-fi-text-slider-item">
                                <p class="text-secondary font-medium!">
                                    {{ $item }}
                                    
                                    <i class="ml-30">
                                        &bull;
                                    </i>
                                </p>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>