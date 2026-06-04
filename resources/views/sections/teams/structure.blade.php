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
                        <h3 class="tp-section-title corporate-color max-md:text-3xl! mb-30" data-text-split data-letters-fade-in>{{ $headline }}</h3>
                        <div class="tp-fade-anim" data-delay=".5">
                            <x-button as="a" href="{{ route('contact') }}" variant="primary">Let's work together</x-button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tp-cc-fact-wrapper pl-120 tp-fade-anim" data-delay=".5">
                        @forelse ($stats as $stat)
                            <div class="tp-cc-fact-item pb-60">
                                <h3 class="tp-cc-fact-item-text">{{ $stat['value'] }}</h3>
                                <span>{{ $stat['label'] }}</span>
                                <p  class="text-gray-600!">{{ $stat['description'] }}</p>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>