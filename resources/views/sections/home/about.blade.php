@props([
    'label' => "Who we are",
    'headline' => 'An independent voice for evidence-based market reform',
    'content' => "
        <p>The Centre for Trade and Business Environment Advocacy is an independent Nigerian non-profit policy, research, and advocacy organisation dedicated to promoting equitable markets for sustainable development. Established in 2018, we work at the intersection of law, economics, governance, and public policy to support reforms that make markets fairer, institutions more effective, and policy processes more inclusive.</p> 
    
        <p>Our work responds to a clear gap in the policy and governance landscape. Many of the reforms that shape trade, investment, competition, consumer welfare, digital governance, sustainability, and public-sector accountability are often discussed without sufficient public-interest analysis or inclusive stakeholder engagement. We exist to help close that gap by generating credible evidence, convening informed dialogue, and supporting reform pathways that are practical, development-oriented, and institutionally realistic.</p>
    ",
    'buttons' => [
        [
            'label' => 'Learn More',
            'url' => route('about'),
            'type' => 'primary',
        ],
        [
            'label' => 'What We Do',
            'url' => route('services'),
            'type' => 'secondary',
        ],
    ],
    'image' => asset('assets/images/home/ctba-about-people-in-a-meeting.png'),
    'features' => [
        'Independent and public-interest driven',
        'Research-led policy advocacy',
        'Dialogue for practical reform'
    ]
])

<div class="tp-fi-about-ptb pt-100 pb-70" data-bg-color="#F7F7F5">
    <div class="container col-md-10 mx-auto">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="tp-fi-about-content mb-30">
                    <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                    <h3 class="tp-section-title mb-30" data-text-split data-letters-fade-in>{{$headline}}</h3>
                    <div class="tp-fade-anim [&>p]:last:mb-[45px]! [&>p]:mb-5! [&>*]:text-gray-600! leading-normal" data-delay=".5">
                        {!! $content !!}
                    </div>
                    <div class="tp-fi-about-btn-wrap tp-fade-anim" data-delay=".7">
                        @forelse($buttons as $button)
                            <x-button as="a" :variant="$button['type']" :href="$button['url']">
                                {{ $button['label'] }}
                            </x-button>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="tp-fi-about-thumb-wrap p-relative text-xl-end mb-30">
                    <img loading="lazy" src="{{ $image }}" class="aspect-square! object-cover" alt="">

                    <div class="tp-fi-about-list tp-fade-anim" data-delay=".7">
                        @forelse ($features as $feature)
                            <div class="tp-fi-about-list-item">
                                <p>
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="9" viewBox="0 0 12 9"
                                            fill="none">
                                            <path d="M10.75 0.75L3.875 7.75L0.75 4.56818" stroke="#222F30"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </i>
                                    {{ $feature }}
                                </p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>