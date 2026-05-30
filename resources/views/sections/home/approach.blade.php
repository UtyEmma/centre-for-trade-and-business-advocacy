@props([
    'label' => 'Our Approach',
    'headline' => 'Turning evidence into action through research, engagement, and collaboration',
    'highlights' => [
        [
            'title' => 'Research-Led <br /> Advocacy',
            'caption' => 'Producing policy-relevant evidence through in-house research, expert collaboration, and analysis that responds to implementation realities.',
            'icon' => 'phosphor-book-bookmark-duotone'
        ],
        [
            'title' => 'Multi-Stakeholder Engagement',
            'caption' => 'Engaging policy makers, regulators, private sector actors, civil society, development partners, and regional bodies through dialogue.',
            'icon' => "phosphor-users-three-duotone"
        ],
        [
            'title' => 'Knowledge & Capacity Strengthening',
            'caption' => 'Supporting institutions and stakeholders through policy dialogues, workshops, seminars, briefings, and practical knowledge products.',
            'icon' => 'phosphor-student-duotone'
        ],
        [
            'title' => 'Convening & Bridge-Building',
            'caption' => 'Creating platforms that bring essential reform actors together to build understanding, cooperation, and shared policy direction.',
            'icon' => 'phosphor-handshake-duotone'
        ],
    ]
])

<div class="tp-cn-philoshopy-ptb p-relative tp-sec-ptb pt-140 pb-110" data-bg-color="#01373D">
    <div class="tp-cn-philoshopy-shape">
        <svg xmlns="http://www.w3.org/2000/svg" width="473" height="563" viewBox="0 0 473 563" fill="none">
        <path d="M323.421 -91C324.382 -30.343 395.506 191.295 610.799 240.591C879.915 302.211 596.382 27.8099 323.421 73.062C306.761 74.9876 280.555 90.3926 309.004 136.607C344.566 194.376 726.135 518.843 186.941 262.736C-244.415 57.8496 241.973 397.876 490.265 550" stroke="white" stroke-opacity="0.04" stroke-width="30"/>
        </svg>
    </div>
    <div class="container col-md-10 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-cn-philoshopy-heading mb-70 z-index-1">
                <span class="tp-section-cn-sub tp-fade-anim">{{ $label }}</span>
                <h3 class="tp-section-title" data-text-split data-letters-fade-in>{{ $headline }}</h3>
                </div>
            </div>
        </div>
        
        <div class="row">
            @forelse ($highlights as $highlight)
                <div class="col-lg-3 col-sm-6">
                    <div class="tp-cn-philoshopy-item text-center mb-30 tp-fade-anim">
                        <div class="tp-cn-philoshopy-item-content">
                            <div class="tp-cn-philoshopy-item-icon mb-30">
                                <span>
                                    @svg($highlight['icon'], 'size-12 text-[#C1F43D]')
                                </span>
                            </div>
                            <h3 class="tp-cn-philoshopy-item-title">
                                {!! $highlight['title'] !!}
                            </h3>
                            <div class="tp-cn-philoshopy-item-btn">
                                <a href="service-details.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                                    <path d="M1 6H11M11 6L6 1M11 6L6 11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="tp-cn-philoshopy-item-text">
                            <p>{{$highlight['caption']}}</p>
                        </div>
                    </div>
                </div>
            @empty                
            @endforelse
        </div>
    </div>
</div>