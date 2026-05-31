@props([
    'label' => 'Our Purpose',
    'headline' => '',
    'vision' => 'To be a respected and influential voice for the promotion of equitable markets for sustainable development.',
    'mission' => 'To promote collective understanding and action among state and non-state actors towards development-oriented trade and regulatory governance reforms.
'
])

<div class="tp-about-vision-ptb pt-80 pb-50" data-bg-color="#F7F7F5">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-about-vision-content mb-55">
                        <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                        <h3 class="tp-section-title fs-32 mb-20" data-text-split data-letters-fade-in>{{$headline}}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="tp-about-vision-item h-full flex items-start tp-fade-anim" data-delay=".7">
                        <div class="tp-about-vision-item-icon">
                            <span>
                                <x-phosphor-target-duotone class="size-14 text-[#C1F43D]" />
                            </span>
                        </div>
                        <div class="tp-about-vision-item-content">
                            <h4 class="tp-about-vision-item-title font-semibold!">Our Vision</h4>
                            <p>{{$vision}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tp-about-vision-item h-full flex items-start tp-fade-anim" data-delay=".5">
                        <div class="tp-about-vision-item-icon">
                            <span>
                                <x-phosphor-binoculars-duotone class="size-14 text-[#C1F43D]" />
                            </span>
                        </div>
                        <div class="tp-about-vision-item-content">
                            <h4 class="tp-about-vision-item-title font-semibold!">Our Mission</h4>
                            <p>{{$mission}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>