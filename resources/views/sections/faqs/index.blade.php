@props([
    'faqs' => $pageFaqs ?? collect(),
    'label' => 'Frequently Asked Questions',
    'headline' => 'Understand how our work brings clarity to markets, institutions, and development.',
    'id' => 'faqs-section',
    'ctaTitle' => 'Still have questions? We are here to provide clarity.',
    'ctaHighlights' => [
        'Evidence-based policy insight',
        'Practical reform guidance',
        'Multi-stakeholder engagement',
        'Clear pathways for collaboration',
    ]
])

@if ($faqs->isNotEmpty())
    <div class="tp-fi-faq-ptb tp-sec-ptb pt-130 pb-90">
    <div class="container col-md-10 mx-auto">
        <div class="row">
            <div class="col-lg-7">
                <div class="tp-fi-faq-wrapper mb-30">
                    <div class="tp-fi-faq-heading mb-60">
                        <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                        <h3 class="tp-section-title" data-text-split data-letters-fade-in>{{$headline}}
                        </h3>
                    </div>
                    <div class="tp-faq-wrap tp-fade-anim" data-delay=".5">
                        <div class="accordion" id="{{ $id }}">
                            @forelse ($faqs as $faq)
                                <x-faqs.item :faq="$faq" :id="$id" :loop="$loop" />
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex justify-content-lg-end tp-fade-anim" data-delay=".7">
                    <div class="tp-fi-faq-support p-relative" data-bg-color="#F7F7F5">
                        <div class="tp-fi-faq-support-shape">
                            <img loading="lazy" src="assets/img/finance/banner/faq-bg.png" alt="">
                        </div>
                        <h3 class="tp-fi-faq-support-title">{{ $ctaTitle }}</h3>
                        <div class="tp-fi-faq-support-list pb-60">
                            <ul>
                                @forelse ($ctaHighlights as $highlight)
                                    <li>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                                fill="none">
                                                <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        {{ $highlight }}
                                    </li>                                    
                                @empty
                                    
                                @endforelse
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                            fill="none">
                                            <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Real time performance tracking
                                </li>
                            </ul>
                        </div>
                        <div class="tp-fi-support-btn">
                            <x-button as="a" href="{{ route('contact') }}" variant="primary">Get in Touch</x-button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif