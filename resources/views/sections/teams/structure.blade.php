@props([
    'label' => 'What we offer',
    'headline' => 'We bring together strategic oversight, executive leadership, programme coordination, and advisory guidance.',
    'stats' => [
        [
            'value' => '2018',
            'label' => 'Established',
            'description' => 'Founded as an independent Nigerian non-profit organisation committed to public-interest policy, research, and advocacy.',
        ],
        [
            'value' => '5',
            'label' => 'Programme Areas',
            'description' => 'Working across trade, competition, digital governance, sustainability, and public-sector accountability.',
        ],
    ]
])

<div class="tp-cc-fact-ptb tp-sec-ptb pt-130 pb-100">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tp-cc-fact-heading">
                        <div class="tp-section-cn-sub tp-fade-anim">{{$label}}</div>
                        <h3 class="tp-section-title corporate-color mb-30" data-text-split data-letters-fade-in>{{ $headline }}</h3>
                        <div class="tp-fade-anim" data-delay=".5">
                            <x-button as="a" href="{{ route('contact') }}" variant="primary">Let's work together</x-button>
                        </div>
                    </div>
                    {{-- <div class="tp-cc-fact-bottom mb-30">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="tp-fi-stories-item mb-30"
                                    data-background="assets/img/finance/stories/card-bg.jpg">
                                    <div class="tp-fi-stories-item-logo mb-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="37" height="40"
                                            viewBox="0 0 37 40" fill="none">
                                            <path
                                                d="M0.964776 34.2205H35.948C36.4809 34.2205 36.9128 34.6525 36.9128 35.1853V39.0352C36.9128 39.5681 36.4809 40 35.948 40H0.964776C0.431945 40 0 39.5681 0 39.0352V35.1853C0 34.6525 0.431945 34.2205 0.964776 34.2205Z"
                                                fill="#BEFF74" />
                                            <path
                                                d="M18.1143 0.0709877L0.601547 7.18803C0.237864 7.33583 0 7.68925 0 8.08182V11.8253C0 12.3582 0.431945 12.7901 0.964776 12.7901H35.9902C36.523 12.7901 36.955 12.3582 36.955 11.8253V8.08182C36.955 7.68925 36.7171 7.33583 36.3534 7.18803L18.8407 0.0709877C18.6078 -0.0236626 18.3472 -0.0236626 18.1143 0.0709877Z"
                                                fill="#BEFF74" />
                                            <path
                                                d="M6.87103 15.7158H10.721C11.2538 15.7158 11.6857 16.1478 11.6857 16.6806V30.3305C11.6857 30.8634 11.2538 31.2953 10.721 31.2953H6.87103C6.33819 31.2953 5.90625 30.8634 5.90625 30.3305V16.6806C5.90625 16.1478 6.33819 15.7158 6.87103 15.7158Z"
                                                fill="#BEFF74" />
                                            <path
                                                d="M26.2763 15.7158H30.1262C30.6591 15.7158 31.091 16.1478 31.091 16.6806V30.3305C31.091 30.8634 30.6591 31.2953 30.1262 31.2953H26.2763C25.7435 31.2953 25.3115 30.8634 25.3115 30.3305V16.6806C25.3115 16.1478 25.7435 15.7158 26.2763 15.7158Z"
                                                fill="#BEFF74" />
                                            <path
                                                d="M16.5732 15.7158H20.4231C20.9559 15.7158 21.3879 16.1478 21.3879 16.6806V30.3305C21.3879 30.8634 20.9559 31.2953 20.4231 31.2953H16.5732C16.0403 31.2953 15.6084 30.8634 15.6084 30.3305V16.6806C15.6084 16.1478 16.0403 15.7158 16.5732 15.7158Z"
                                                fill="#BEFF74" />
                                        </svg>
                                    </div>
                                    <div class="tp-fi-stories-item-content">
                                        <h4 class="tp-fi-stories-item-title">28</h4>
                                        <span class="m-0">Years of experience <br> since 1998</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="tp-cc-fact-thumb">
                                    <img class="radius-6" src="assets/img/corporate/service/fact-1.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-6">
                    <div class="tp-cc-fact-wrapper pl-120 tp-fade-anim" data-delay=".5">
                        @forelse ($stats as $stat)
                            <div class="tp-cc-fact-item pb-60">
                                <h3 class="tp-cc-fact-item-text">{{ $stat['value'] }}</h3>
                                <span>{{ $stat['label'] }}</span>
                                <p>{{ $stat['description'] }}</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>