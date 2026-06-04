@props([
    'label' => 'Why Join Us',
    'description' => 'Working with the Centre means contributing to issues that shape markets, governance, and sustainable development. Our team environment encourages independent thinking, intellectual discipline, collaboration, and a strong commitment to public-interest reform.',
    'headline' => 'We invest in people who care about evidence, institutions, and impact.',
    'features' => [
        ['icon' => 'phosphor-book-bookmark-duotone', 'title' => 'Research-Driven Work', 'info' => 'Contribute to evidence-based analysis that supports policy dialogue, institutional reform, and better decision-making.'],
        ['icon' => 'phosphor-users-three-duotone', 'title' => 'Public-Interest Mission', 'info' => 'Work on issues that strengthen fair markets, transparent governance, and sustainable development outcomes.'],
        ['icon' => 'phosphor-flag-pennant-duotone', 'title' => 'Collaborative Environment', 'info' => 'Join a team that values discipline, initiative, respect, and shared commitment to practical reform outcomes.'],
    ]

])
<div id="why-join" class="tp-career-ptb pt-140" data-bg-color="#F7F7F5">
    <div class="container col-md-10 mx-auto">
        <div class="tp-career-top-wrap">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tp-career-heading mb-30">
                        <span class="tp-section-sub tp-fade-anim">{{ $label }}</span>
                        <h3 class="tp-section-title max-md:text-3xl!" data-text-split data-letters-fade-in>{{$headline}}</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="tp-career-text mb-30 tp-fade-anim" data-delay=".5">
                        <p  class="[&>p]:text-gray-600!">{{ $description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tp-fa-control-ptb tp-cc-control-style tp-sec-ptb pt-70 pb-90" data-bg-color="#F7F7F5">
    <div class="tp-fa-control-bottom mt-0!">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                @forelse ($features as $feature)
                    <div class="col-lg-4 col-md-6">
                        <div class="tp-fa-control-item mb-30 tp-fade-anim">
                            <div class="tp-fa-control-item-icon">
                                <span>
                                    @svg($feature['icon'], 'text-primary size-10')
                                </span>
                            </div>
                            <div class="tp-fa-control-item-content">
                                <h3 class="tp-fa-control-item-title">{{ $feature['title'] }}</h3>
                                <p>{{ $feature['info'] }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>