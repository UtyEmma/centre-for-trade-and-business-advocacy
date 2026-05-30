@props([
    'slides' => [
        [
            'image' => asset('assets/images/home/ctba-hero-slide-1.png'),
            'badge' => 'Independent policy voice',
            'headline' => 'Promoting equitable markets for sustainable development',
            'description' => 'The Centre for Trade and Business Environment Advocacy works to strengthen fair markets, effective regulation, and inclusive economic governance in Nigeria and across Africa.',
            'buttons' => [
                [
                    'label' => 'Explore Our Work',
                    'url' => '/what-we-do',
                    'type' => 'primary',
                ],
                [
                    'label' => 'Learn More',
                    'url' => '/who-we-are',
                    'type' => 'secondary',
                ],
            ],
            'stats' => [
                [
                    'value' => '2018',
                    'label' => 'Established',
                    'description' => 'Independent public-interest organisation',
                ],
                [
                    'value' => 'Africa',
                    'label' => 'Outlook',
                    'description' => 'Rooted in Nigeria, engaged across the continent',
                ],
            ],
        ],
        [
            'image' => asset('assets/images/home/ctba-hero-slide-2.png'),
            'badge' => 'Research. Dialogue. Reform.',
            'headline' => 'Advocating evidence <br /> based reforms for <br /> fairer markets',
            'description' => 'We support development-oriented reforms across trade, competition, consumer protection, digital governance, sustainability, and public-sector accountability.',
            'buttons' => [
                [
                    'label' => 'View Programme Areas',
                    'url' => '/what-we-do',
                    'type' => 'primary',
                ],
                [
                    'label' => 'Read Our Publications',
                    'url' => '/publications',
                    'type' => 'secondary',
                ],
            ],
            'stats' => [
                [
                    'value' => '5',
                    'label' => 'Programme Areas',
                    'description' => 'Focused on market governance and reform',
                ],
                [
                    'value' => 'Public Interest',
                    'label' => 'Focus',
                    'description' => 'Evidence for better policy outcomes',
                ],
            ],
        ],
        [
            'image' => asset('assets/images/home/ctba-hero-slide-3.png'),
            'badge' => 'Convening for impact',
            'headline' => 'Connecting institutions, evidence, & stakeholders for lasting change',
            'description' => 'We create platforms for informed dialogue among policy makers, regulators, private sector actors, civil society, researchers, and development partners.',
            'buttons' => [
                [
                    'label' => 'How We Work',
                    'url' => '/how-we-work',
                    'type' => 'primary',
                ],
                [
                    'label' => 'Partner With Us',
                    'url' => '/contact',
                    'type' => 'secondary',
                ],
            ],
            'stats' => [
                [
                    'value' => 'Multi-Stakeholder',
                    'label' => 'Engagement',
                    'description' => 'Dialogue across sectors',
                ],
                [
                    'value' => 'Research-Led',
                    'label' => 'Advocacy',
                    'description' => 'Policy grounded in evidence',
                ],
            ],
        ],
    ]
])

<div class="tp-at-hero-ptb p-relative">
    <div class="swiper tp-at-hero-slider-active p-relative">
        <div class="swiper-wrapper">
            @forelse ($slides as $key => $slide)        
                 @php
                    $attributes = new \Illuminate\View\ComponentAttributeBag($slide);
                @endphp    
                <x-home.hero.slider :attributes="$attributes" />
            @empty                
            @endforelse
        </div>

        <div class="tp-at-hero-slider-dots"></div>
    </div>
</div>