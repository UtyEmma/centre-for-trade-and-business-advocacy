@props([
    'label' => 'Who we are',
    'headline' => 'An independent voice for evidence-based market reform',
    'content' => "
        <p>The Centre for Trade and Business Environment Advocacy Ltd/GTE is an independent Nigerian non-profit policy, research, and advocacy organisation dedicated to promoting equitable markets for sustainable development in Nigeria and across Africa.</p>
        <p>Since its establishment in 2018, the Centre has worked to support development-oriented reforms across trade, competition, consumer protection, digital governance, sustainability, and public-sector accountability. Our work brings together law, economics, governance, and public policy to help shape reform conversations that are evidence-based, practical, and responsive to real institutional conditions.</p>  
        <p>We exist to fill an important gap in the policy and governance landscape by generating credible analysis, convening informed dialogue, and supporting reform processes that strengthen market outcomes while advancing wider development priorities.</p>
    ",
    'stats' => [
        ['stat' => '2018', 'number' => 2018, 'label' => 'Established as an independent public-interest organisation.'],
        ['stat' => '5', 'number' => 5, 'label' => 'Programme areas across key market governance issues.'],
        ['stat' => '7+', 'number' => 7, 'label' => 'Policy research and advocacy projects completed.'],
    ]
])

<div class="tp-about-ptb tp-sec-ptb pt-135 pb-110">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-5">
                    <div class="tp-about-thumb-wrap h-100  mb-30 tp-fade-anim" data-fade-from="left">
                        <img class="radius-6 aspect-3/4 object-cover" src="{{ asset('assets/images/about/ctba-lady-portrait-who-we-are.png') }}"  alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="tp-about-wrapper">
                        <div class="tp-fi-about-content pb-50">
                            <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                            <h3 class="tp-section-title mb-20" data-text-split data-letters-fade-in>{{ $headline }}</h3>
                            <div class="tp-fade-anim flex flex-col gap-3" data-delay=".5">
                                {!! $content !!}
                            </div>
                        </div>
                        <div class="row align-items-center">
                            {{-- <div class="col-lg-5">
                                <div class="tp-about-thumb mb-30 tp-fade-anim" data-delay=".5" data-fade-from="left">
                                    <img class="radius-6" src="assets/img/finance/about/about-2.jpg" alt="">
                                </div>
                            </div> --}}
                            <div>
                                <div class="tp-fade-anim" data-delay=".7">
                                    @forelse ($stats as $stat)
                                        <div class="tp-about-fact-item">
                                            <h3 class="tp-about-fact-item-title">{{$stat['stat']}}</h3>
                                            <p>{{ $stat['label'] }}</p>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex gap-4 flex-wrap mt-8">
                        <x-button href="{{ route('about') }}" as="a" class="tp-fade-anim mt-8" data-delay=".9">
                            See what we do
                        </x-button>
                        <x-button href="{{ route('contact') }}" variant="secondary" as="a" class="tp-fade-anim mt-8" data-delay=".9">
                            Get in touch
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>