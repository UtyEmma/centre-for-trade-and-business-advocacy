@props([
    'label' => 'What We Do',
    'headline' => 'Advancing reforms across trade, markets, governance, and policy',
    'services' => collect(),
    'cta' => 'Learn More'
])

@if ($services->isNotEmpty())
    <div class="tp-fi-service-ptb tp-sec-ptb pt-130 pb-110">
        <div class="container col-md-10 mx-auto">
            @if ($label || $headline || $cta)
                <div class="row align-items-end">
                    <div class="col-lg-10">
                        <div class="tp-fi-service-heading mb-60">
                            @if ($label)
                                <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                            @endif
                            
                            @if ($headline)
                                <h3 class="tp-section-title md:w-2/3" data-text-split data-letters-fade-in>{{$headline}}
                                </h3>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-2">
                        @if ($cta)
                            <div class="tp-fi-service-right text-lg-end mb-60 tp-fade-anim">
                                <x-button as="a" href="{{ route('services') }}" variant="primary">{{ $cta }}</x-button>
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <div class="row g-3">
                @forelse ($services as $service)
                    <div class="col-md-6">
                        <x-services.list :service="$service" />
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endif