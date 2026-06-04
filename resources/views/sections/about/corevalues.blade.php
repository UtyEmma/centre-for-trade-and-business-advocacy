@props([
    'label' => 'Our core values',
    'headline' => 'Public-interest insight. Independent analysis. Practical reform.',
    'content' => "
        <p>Our work is guided by the belief that markets serve development best when they are governed by fairness, transparency, accountability, and inclusion. We bring a public-interest perspective to complex policy and regulatory questions, combining evidence, dialogue, and institutional understanding to support reforms that are both ambitious and achievable.</p>
    ",
    'points' => [
        ['point' => 'Independence in policy engagement', 'detail' => 'We operate free from undue influence and remain guided by public-interest priorities.'],
        ['point' => 'Evidence-based advocacy', 'detail' => 'Our positions are grounded in research, analysis, and implementation realities.'],
        ['point' => 'Dialogue across institutions', 'detail' => 'We create space for government, private sector, civil society, academia, and development partners to engage.'],
        ['point' => 'Reform with practical pathways', 'detail' => 'We focus not only on policy ideas, but also on how reforms can be implemented and sustained.'],
    ]
])

<div class="tp-fi-value-ptb tp-sec-ptb pt-130 pb-100">
    <div class="container col-md-10 mx-auto">
        <div class="row">
            <div class="col-lg-6">
                <div class="tp-fi-value-thumb-wrapper p-relative  mb-30 mt-30">
                    <div class="tp-fi-value-thumb-main tp-fade-anim" data-fade-from="left">
                        <img loading="lazy" src="{{ asset('assets/images/about/ctba-group-meeting-about-us.png') }}" alt="">
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="tp-fi-value-content mb-30">
                    <div class="tp-fi-value-heading">
                        <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                        <h3 class="tp-section-title mb-30" data-text-split data-letters-fade-in>{{$headline}}</h3>
                        <div class="tp-fade-anim  [&>p]:text-gray-600!" data-delay=".5">
                            {!! $content !!}
                        </div>
                    </div>
                    <div class="tp-fi-value-list tp-fade-anim" data-delay=".7">
                        <ul class="space-y-1!">
                            @forelse ($points as $point)
                                <li class="flex! items-start!" >
                                    <div class="pt-0" >
                                        <span class="shrink-0! ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="8" viewBox="0 0 11 8"
                                                fill="none">
                                                <path d="M9.18182 1L3.55682 6.7754L1 4.15022" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                    </div>

                                    <div>
                                        <h5>{{ $point['point'] }}</h5>
                                        <p>{{ $point['detail'] }}</p>
                                    </div>
                                </li>
                                
                            @empty
                                
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>