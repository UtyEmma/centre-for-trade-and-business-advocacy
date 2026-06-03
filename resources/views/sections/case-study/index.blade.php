@props([
    'title' => "Our Experience",
    'headline' => "Turning research, diagnosis, and engagement into reform pathways",
    'casestudies' => collect()
])

<div class="tp-case-studies-ptb tp-sec-ptb pt-135 pb-110">
    <div class="container col-md-10 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-fi-service-heading text-center mb-60">
                <span class="tp-section-sub tp-fade-anim">{{ $title }}</span>
                <h3 class="tp-section-title" data-text-split data-letters-fade-in>{{$headline}}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 mx-auto mb-60">
            <form action="{{ route('case-studies') }}" class="tp-sidebar-search">
                <div>
                    <div class="tp-sidebar-search-input">
                        <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search here">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                <path d="M1 17L4.86666 13.1333M2.77727 8.1111C2.77727 12.0385 5.96102 15.2222 9.88837 15.2222C13.8157 15.2222 16.9995 12.0385 16.9995 8.1111C16.9995 4.18375 13.8157 1 9.88837 1C5.96102 1 2.77727 4.18375 2.77727 8.1111Z" stroke="#222F30" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>


        <div class="row">
            @forelse ($casestudies as $caseStudy)
                <div class="col-lg-6">
                    <x-case-studies.item :caseStudy="$caseStudy" />
                </div>
            @empty
                <p class="text-center">No case studies available at the moment. Please check back later.</p>
            @endforelse
        </div>
    </div>
</div>