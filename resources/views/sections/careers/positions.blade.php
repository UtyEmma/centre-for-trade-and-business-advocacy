@props([
    'jobs' => collect(),
])

<div id="positions" class="tp-career-role-ptb tp-sec-ptb pt-130 pb-140" data-bg-color="#222F30">
        <div class="container col-md-10 mx-auto">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="tp-career-role-heading mb-50 text-center col-md-10 mx-auto">
                        <h3 class="tp-section-title max-md:text-3xl! text-white" data-text-split data-letters-fade-in>Explore our open roles and join a team that’s driving innovation and success.</h3>
                    </div>
                    <div class="tp-career-role-wrapper tp-fade-anim" data-delay=".5">
                        @forelse ($jobs as $job)                        
                            <x-career.item :job="$job" />  
                        @empty
                            <p class="text-white text-center">No available job listings at the moment. Please check back later</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
