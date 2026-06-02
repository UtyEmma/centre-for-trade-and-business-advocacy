 <div class="tp-case-studies-item p-relative mb-25">
    @if ($caseStudy->image)
        <div class="tp-case-studies-item-thumb fix mb-30 radius-6">
            <a href="{{ route('case-studies.show', $caseStudy) }}">
                <img class="radius-6" src="{{ $caseStudy->image }}" alt="">
            </a>
        </div>
    @endif
    <div class="tp-case-studies-item-content ">
        <h3 class="tp-case-studies-item-title px-0!">
            <a class="tp-line-anim" href="{{ route('case-studies.show', $caseStudy) }}" >{{ $caseStudy->title }}</a>
        </h3>
        <p class="line-clamp-3 px-0! text-gray-600!">{{ $caseStudy->summary }}</p>
    </div>
</div>