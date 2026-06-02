@props([
    'label' => 'Join our Team',
    'description' => 'Explore opportunities to contribute to research, policy engagement, stakeholder dialogue, and reform-focused work across Nigeria and Africa.'
])

<div class="tp-career-join-ptb pt-130">
    <div class="container col-md-10 mx-auto">
        <div class="row">
            <div class="col-lg-12">
                <div class="tp-career-join-heading text-center pb-60 border-b-0!">
                    <h3 class="tp-section-title mb-15" data-text-split data-letters-fade-in>{{ $label }}</h3>
                    <p class="mb-30 col-md-8 mx-auto">{{$description}}</p>

                    <div class="tp-career-join-btn-box d-flex justify-content-center gap-3 flex-wrap mb-30 tp-fade-anim"
                        data-delay=".5">
                        <x-button as="a" href="#positions" >
                            See open positions
                        </x-button>
                        <x-button as="a" href="#why-join" variant="secondary" >
                            Why join us
                        </x-button>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-12">
                <div class="tp-career-join-gallery-wrapper text-center z-index-1">
                    <h3 class="tp-section-title mb-25 col-md-7 mx-auto" data-text-split data-letters-fade-in>“We believe meaningful reform begins with people who are curious, rigorous, collaborative, and committed to public purpose.”</h3>

                    <p>Centre for Trade and Business Environment Advocacy</p>
                    <div class="tp-career-join-gallery-box">
                        <div class="tp-career-join-gallery-thumb-1">
                            <img class="radius-6" src="assets/img/finance/career/thumb-1.jpg" alt="">
                        </div>
                        <div class="tp-career-join-gallery-thumb-2">
                            <img class="radius-6" src="assets/img/finance/career/thumb-2.jpg" alt="">
                        </div>
                        <div class="tp-career-join-gallery-thumb-3">
                            <img class="radius-6" src="assets/img/finance/career/thumb-3.jpg" alt="">
                        </div>
                        <div class="tp-career-join-gallery-thumb-4">
                            <img class="radius-6" src="assets/img/finance/career/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>