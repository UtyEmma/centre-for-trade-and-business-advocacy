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