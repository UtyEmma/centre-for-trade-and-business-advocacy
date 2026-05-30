@props([
    'teamMembers' => collect(),
    'label' => 'Leadership & Team',
    'headline' => 'Bringing together insight, experience, and commitment to sustainable reform',
])

@if ($teamMembers->isNotEmpty())
    <div class="tp-cc-team-ptb tp-sec-ptb pt-140 pb-110" data-bg-color="#123543">
        <div class="tp-cc-team-top tp-sec-line mb-60">
            <div class="container col-md-10 mx-auto">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="tp-cc-team-heading mb-60">
                            <span class="tp-cc-section-sub tp-fade-anim">{{ $label }}</span>
                            <h3 class="tp-section-title advisory-color" data-text-split data-letters-fade-in>{{$headline}}</h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="tp-cc-team-right d-flex flex-wrap gap-lg-5 gap-3 align-items-center justify-content-lg-end mb-60 tp-fade-anim"
                            data-delay=".5">
                            <div class="tp-fa-hero-btn">
                                <a href="{{ route('careers') }}">Join our team
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                            fill="none">
                                            <path d="M0.75 4.75H8.75" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.75 0.75L8.75 4.75L4.75 8.75" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </span>
                                </a>
                            </div>
                            <div class="tp-fa-control-btn">
                                <a class="tp-btn tp-btn-advisory-style tp-btn-border tp-btn-switch-animation"
                                    href="{{ route('teams') }}">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <span class="btn-text">
                                            View all members
                                        </span>
                                        <i class="btn-icon"></i>
                                        <i class="btn-icon"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container col-md-10 mx-auto">
            <div class="row">
                @forelse ($teamMembers as $teamMember)
                    <x-team.secondary :teamMember="$teamMember" />
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endif