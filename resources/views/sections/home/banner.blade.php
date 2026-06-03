@props([
    'headline' => 'From Evidence to Reform',
    'description' => 'We help translate research, dialogue, and stakeholder engagement into practical reform pathways that inform policy development, institutional strengthening, and implementation efforts.',
    'image' => asset('assets/images/home/ctba-banner-people-discussing-policy.png'),
])

<div class="tp-fi-banner-ptb">
    <div class="tp-fi-banner-wrapper p-relative fix">
        <img loading="lazy" src="{{ $image }}" class="w-full object-cover md:h-[90vh]!" alt="">
        <div class="tp-fi-banner-content tp-fade-anim" data-delay=".5" data-fade-from="right">
            <h3 class="tp-fi-banner-title font-medium">{{ $headline }}</h3>
            <p class="text-justify">{{ $description }}</p>
        </div>
        <div class="tp-cn-success-item-2-shape">
            <img loading="lazy" src="assets/img/consulting/success/shape.png" alt="">
        </div>
    </div>
</div>