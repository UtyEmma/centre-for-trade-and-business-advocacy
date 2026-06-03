<div class="tp-cc-project-item p-relative">
    <div class="tp-cc-project-item-thumb">
        <img loading="lazy" class="radius-6 aspect-3/4 object-cover" src="{{ $caseStudy->image }}" alt="{{ $caseStudy->title }}">
    </div>
    <div class="tp-cc-project-item-box">
    <div class="tp-cc-project-item-content">
        <h3 class="tp-cc-project-item-title">
            <a class="tp-line-anim" href="{{ route('case-studies.show', $caseStudy) }}">{{ $caseStudy->title }}</a>
        </h3>
        <p>{{$caseStudy->summary}}</p>
        <div class="tp-cc-project-item-btn">
            <a href="{{ route('case-studies.show', $caseStudy) }}">
                Read more 
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                <path d="M0.75 6.75H12.75M12.75 6.75L6.75 0.75M12.75 6.75L6.75 12.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                </span>
            </a>
        </div>
    </div>
    </div>
</div>