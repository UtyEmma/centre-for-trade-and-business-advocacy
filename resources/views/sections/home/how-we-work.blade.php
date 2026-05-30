@props([
    'label' => 'How We Work',
    'headline' => 'We connect research, engagement, capacity-building, and collaboration for sustainable reform',
    'highlights' => [
        [
            'title' => 'Research & Analysis',
            'caption' => 'We produce credible, policy-relevant evidence through research, expert collaboration, and practical analysis that helps stakeholders understand reform challenges and assess policy options.',
            'icon' => 'phosphor-book-open-duotone'
        ],
        [
            'title' => 'Engagement & Advocacy',
            'caption' => 'We engage policy makers, regulators, development partners, private sector actors, and civil society through dialogue, submissions, commentary, and targeted advocacy.',
            'icon' => 'phosphor-megaphone-simple-duotone'
        ],
        [
            'title' => 'Capacity Strengthening',
            'caption' => 'We support institutions and stakeholders through policy dialogues, workshops, seminars, briefings, and learning engagements that improve understanding and participation.',
            'icon' => 'phosphor-student-duotone'
        ],
        [
            'title' => 'Convening & Collaboration',
            'caption' => 'We create platforms that bring diverse reform actors together to exchange perspectives, build trust, strengthen cooperation, and pursue shared policy outcomes.',
            'icon' => 'phosphor-handshake-duotone'
        ],
    ]
])

<div class="tp-about-vision-ptb pt-80 pb-50" data-bg-color="#fffff" >
    <div class="container col-md-10 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-about-vision-content mb-55">
                <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                <h3 class="tp-section-title md:w-2/3 fs-32 mb-20" data-text-split data-letters-fade-in>{{ $headline }}</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($highlights as $highlight)    
                <div class="col-lg-6">
                    <div class="tp-about-vision-item bg-[#F7F7F5]! mb-30 tp-fade-anim" data-delay=".5">
                        <div class="tp-about-vision-item-icon">
                            <span>
                                @svg($highlight['icon'], 'size-10 ')
                            </span>
                        </div>
                        <div class="tp-about-vision-item-content">
                            <h4 class="tp-about-vision-item-title">{{ $highlight['title'] }}</h4>
                            <p>{{ $highlight['caption'] }}</p>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>