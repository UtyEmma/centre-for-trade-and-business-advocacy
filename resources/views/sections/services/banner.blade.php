@props([
    'description' => 'We help translate research, dialogue, and stakeholder engagement into practical reform pathways that inform policy development, institutional strengthening, and implementation efforts.',
    'image' => asset('assets/images/home/ctba-banner-people-discussing-policy.png'),
])
<div class="tp-fi-banner-ptb">
    <div class="tp-fi-banner-wrapper md:h-96! h-64!">
        <img loading="lazy" src="{{ $image }}" class="h-full! w-full object-cover" alt="">
    </div>
    <div class="tp-fi-banner-wrap" data-bg-color="#222F30">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                <p class="tp-fi-banner-text">
                    {{ $description }}
                    <a class="link tp-btn-underline" href="{{ route('contact') }}">Get in touch with us</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</div>