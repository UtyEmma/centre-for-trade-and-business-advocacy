@props([
    'description' => 'We help translate research, dialogue, and stakeholder engagement into practical reform pathways that inform policy development, institutional strengthening, and implementation efforts.',
    'image' => asset('assets/images/home/ctba-banner-people-discussing-policy.png'),
])
<div class="tp-fi-banner-ptb">
    <div class="tp-fi-banner-wrapper">
        <img loading="lazy" src="{{ $image }}" class="h-96! w-full object-cover" alt="">
    </div>
    <div class="tp-fi-banner-wrap" data-bg-color="#222F30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <p class="tp-fi-banner-text">
                    {{-- <span class="video">
                        <a href="#" class="popup-video">
                            <svg xmlns="http://www.w3.org/2000/svg" width="8" height="9" viewBox="0 0 8 9" fill="none">
                            <path d="M7.07143 5.08418C7.73809 4.69928 7.7381 3.73703 7.07143 3.35213L1.5 0.135466C0.833334 -0.249434 0 0.231691 0 1.00149V7.43482C0 8.20462 0.833333 8.68575 1.5 8.30085L7.07143 5.08418Z" fill="#222F30"/>
                            </svg>
                        </a>
                    </span> --}}
                    {{ $description }}
                    <a class="link tp-btn-underline" href="{{ route('contact') }}">Get in touch with us</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>