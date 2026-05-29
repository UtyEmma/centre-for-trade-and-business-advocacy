<main>

    <x-partials::page.header 
        title="{{ $teamMember->name }}"
        description="At Consora, we believe in transforming ideas into impactful digital solutions. As a forward thinking agency, we specialize in empowering businesses to thrive in the digital era. From cutting-edge web development to strategic digital marketing,"
    />  


    <!-- team details area start -->
    <div class="tp-team-details-ptb tp-sec-ptb pt-140 pb-110">
        <div class="container col-md-10 mx-auto">
            <div class="row gap-10">
                <div class="col-lg-4">
                    <div class="tp-team-details-thumb mb-30 tp-fade-anim" data-fade-from="left">
                        <img class="radius-6 aspect-3/4 object-cover" src="{{ $teamMember->image }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="tp-team-details-wrapper mb-30">
                        <div class="tp-team-details-heading">
                            <div>
                                <h3 class="tp-team-details-title" data-text-split data-letters-fade-in>{{ $teamMember->name }}</h3>
                                <p class="text-lg!">{{$teamMember->role}} - {{$teamMember->category->name}}</p>
                            </div>

                            <div>
                                {!! $teamMember->bio !!}
                            </div>
                        </div>
                        <div class="tp-team-details-content">
                            <div class="tp-team-details-contact">
                                <span>Phone: <a href="tel:+12345678910">+1 234 567 8910</a></span>
                            </div>
                            <div class="tp-team-details-contact">
                                <span>Office: <a href="tel:+12345678910">+1 234 567 8910</a></span>
                            </div>
                            @if ($teamMember->email)
                                <div class="tp-team-details-contact">
                                    <span>Email: <a href="mailto:{{ $teamMember->email }}">{{ $teamMember->email }}</a></span>
                                </div>
                            @endif
                        </div>
                        {{-- <div class="tp-team-details-rating">
                            <p>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16"
                                        fill="none">
                                        <path
                                            d="M13.4045 9.95302C13.1864 10.1644 13.0862 10.47 13.1359 10.7698L13.8844 14.9127C13.9476 15.2638 13.7994 15.6192 13.5055 15.8221C13.2175 16.0326 12.8344 16.0579 12.5203 15.8895L8.79089 13.9443C8.66121 13.8753 8.51722 13.8382 8.36986 13.834H8.14167C8.06251 13.8458 7.98505 13.8711 7.91431 13.9098L4.18404 15.8642C3.99963 15.9568 3.7908 15.9897 3.58618 15.9568C3.08769 15.8625 2.75508 15.3876 2.83676 14.8866L3.58618 10.7437C3.63586 10.4414 3.53566 10.1341 3.31757 9.91934L0.27693 6.97217C0.0226308 6.72545 -0.0657844 6.35494 0.0504184 6.02065C0.163253 5.6872 0.451234 5.44385 0.799 5.38911L4.98398 4.782C5.30228 4.74916 5.58184 4.55549 5.72499 4.26919L7.56907 0.488388C7.61286 0.404184 7.66928 0.326715 7.73748 0.261035L7.81327 0.202092C7.85284 0.158305 7.89831 0.122097 7.94884 0.0926254L8.04062 0.0589434L8.18377 0H8.53827C8.85488 0.0328399 9.1336 0.222301 9.27927 0.505229L11.1478 4.26919C11.2825 4.54454 11.5444 4.73568 11.8467 4.782L16.0317 5.38911C16.3853 5.43964 16.6809 5.68383 16.7979 6.02065C16.9082 6.35831 16.8131 6.72881 16.5537 6.97217L13.4045 9.95302Z"
                                            fill="#FFB21D" />
                                    </svg>
                                    4.5
                                </span>
                                Rating based on business 7548 reviews.
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team details area end -->


    <!-- cta area start -->
    <div class="tp-fa-cta-ptb">
        <div class="tp-fa-cta-thumb">
            <img src="{{ asset('assets/img/advisory/cta/thumb.jpg') }}" alt="">
        </div>
    </div>
    <!-- cta area end -->


</main>