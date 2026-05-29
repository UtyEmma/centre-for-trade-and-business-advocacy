<div class="tp-career-role-item d-flex align-items-center justify-content-between">
    <div class="tp-career-role-item-content">
        <h3 class="tp-career-role-item-title">
            <a class="tp-line-anim" href="{{ route('careers.show', $job) }}">{{ $job->title }}</a>
        </h3>
        <span>{{ $job->location }} - {{ $job->department }}</span>
    </div>
    <div class="tp-career-role-item-btn">
        <a href="{{ route('careers.show', $job) }}">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    viewBox="0 0 16 16" fill="none">
                    <path d="M1 8H15M15 8L8 1M15 8L8 15" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </a>
    </div>
</div>