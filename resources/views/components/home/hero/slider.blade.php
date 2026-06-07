@props([
    'image' => asset('assets/img/accounting/hero/thumb-1.jpg') ,
    'badge' => 'Independent policy voice',
    'headline' => 'Promoting equitable markets for sustainable development',
    'description' => 'The Centre for Trade and Business Environment Advocacy works to strengthen fair markets, effective regulation, and inclusive economic governance in Nigeria and across Africa.',
    'buttons' => [
        [
            'label' => 'Explore Our Work',
            'url' => '/what-we-do',
            'type' => 'primary',
        ],
        [
            'label' => 'Learn More',
            'url' => '/who-we-are',
            'type' => 'secondary',
        ],
    ],
    // 'stats' => [
    //     [
    //         'value' => '2018',
    //         'label' => 'Established',
    //         'description' => 'Independent public-interest organisation',
    //     ],
    //     [
    //         'value' => 'Africa',
    //         'label' => 'Outlook',
    //         'description' => 'Rooted in Nigeria, engaged across the continent',
    //     ],
    // ],
])

<div class="swiper-slide">
    <div class="tp-at-hero-item p-relative pt-170 pb-90 max-md:pt-[100px]! max-md:pb-[40px]!">
        <div class="tp-at-hero-item-thumb">
            <img loading="lazy" src="{{ $image }}" alt="{{ $headline }}">
        </div>
        <div class="tp-cn-hero-bg tp-fade-anim" data-delay=".4" data-fade-from="left">
            <img loading="lazy" src="{{ asset('assets/img/consulting/hero/bg-shape.png') }}" alt="">
        </div>
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tp-at-hero-wrapper z-index-1">
                        <div class="pb-5 col-md-8">
                            <div class="tp-cn-hero-top d-flex mb-20 tp-fade-anim">
                                <span class="tp-cn-hero-sub">{{ $badge }}</span>
                                <div class="tp-cn-hero-star">
                                    
                                </div>
                            </div>
                            
                            <h3 class="tp-cn-hero-title mb-35 max-md:text-4xl!" data-text-split data-letters-fade-in>{!! $headline !!}</h3>

                            <div class="tp-cn-hero-content col-md-10 d-flex justify-content-between align-items-center tp-fade-anim"
                                data-delay=".6">
                                <div class="tp-fi-hero-sub">
                                    <span class="max-md:hidden!">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38"
                                            viewBox="0 0 38 38" fill="none">
                                            <path d="M37 37.7V0.699951H0" stroke="currentColor" stroke-width="1.4">
                                            </path>
                                            <path d="M36.7533 0.946655L0.740005 36.96" stroke="currentColor"
                                                stroke-width="1.4"></path>
                                        </svg>
                                        {{-- <x-phosphor-arrow-trend-up class="text-white size-32!" /> --}}
                                    </span>
                                    <p class="max-md:mb-0!">
                                        {{$description}}
                                    </p>
                                </div>
                            </div>
                            <div class="tp-fi-hero-bottom mt-40">
                                <div class="flex max-md:flex-col gap-2 mb-20 md:gap-4">
                                    @forelse ($buttons as $button)
                                        <div class="tp-fi-hero-btn tp-fade-anim" data-delay=".5">
                                            <x-button as="a" :variant="$button['type']" href="{{ $button['url'] }}">{{$button['label']}}</x-button>
                                        </div>
                                    @empty
                                        
                                    @endforelse
                                </div>

                                @if (isset($siteSettings->phone) && $siteSettings->phone)
                                    <div class="tp-fi-hero-contact tp-fade-anim ">
                                        <a href="tel:01245697" class="text-white">
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M13.2811 17.9971C7.18994 18.2031 -3.78322 7.31835 1.31157 1.41675L2.17306 0.667624C2.60914 0.246066 3.19368 0.0131721 3.80018 0.0193408C4.40667 0.0255095 4.98635 0.270245 5.41377 0.700585C5.43687 0.724111 5.45839 0.749136 5.47819 0.775498L6.82662 2.5277C7.2364 2.96132 7.46409 3.5357 7.4627 4.13232C7.46131 4.72894 7.23093 5.30225 6.81912 5.73395L5.95164 6.82468C6.43192 7.99112 7.13782 9.05123 8.02883 9.94417C8.91984 10.8371 9.97842 11.5453 11.1438 12.0281L12.2405 11.1554C12.6778 10.7537 13.2498 10.5305 13.8435 10.5296C14.4373 10.5288 15.0098 10.7505 15.4483 11.1509L17.2012 12.4993C17.2274 12.519 17.2524 12.5403 17.2761 12.563C17.7084 12.9993 17.951 13.5886 17.951 14.2028C17.951 14.817 17.7084 15.4063 17.2761 15.8426L16.5937 16.6292C16.1608 17.0668 15.6447 17.4133 15.0757 17.6483C14.5068 17.8832 13.8966 18.0018 13.2811 17.9971ZM3.77394 1.51638C3.66628 1.5163 3.55967 1.53743 3.46018 1.57856C3.36069 1.61969 3.27028 1.68002 3.19412 1.7561L2.33187 2.50523C-1.89768 7.59028 11.0449 19.8122 15.497 15.6059L16.1802 14.8186C16.2614 14.7463 16.3275 14.6587 16.3747 14.5607C16.4219 14.4628 16.4492 14.3565 16.4551 14.2479C16.4611 14.1393 16.4454 14.0307 16.4092 13.9282C16.3729 13.8257 16.3167 13.7314 16.2438 13.6507L14.5006 12.312C14.4739 12.2924 14.4489 12.2706 14.4257 12.2468C14.2694 12.0979 14.0618 12.0148 13.8459 12.0148C13.63 12.0148 13.4224 12.0979 13.2661 12.2468C13.2462 12.267 13.2252 12.286 13.2032 12.3038L11.7364 13.4724C11.6345 13.5535 11.5134 13.6066 11.3848 13.6265C11.2562 13.6465 11.1246 13.6326 11.003 13.5863C9.49284 13.0237 8.12126 12.1431 6.98116 11.0042C5.84106 9.86524 4.95908 8.49455 4.39496 6.98499C4.34502 6.86166 4.32883 6.72726 4.34805 6.59559C4.36727 6.46393 4.42122 6.33977 4.50433 6.23587L5.66847 4.77058C5.68579 4.74838 5.70456 4.72736 5.72466 4.70765C5.87768 4.55332 5.96353 4.34479 5.96353 4.12745C5.96353 3.91012 5.87768 3.70159 5.72466 3.54726C5.70131 3.52396 5.67977 3.49892 5.66023 3.47235L4.32454 1.73138C4.17362 1.59502 3.97734 1.51971 3.77394 1.52013V1.51638ZM16.8784 9.43912C20.6165 3.9368 14.0317 -2.64126 8.53537 1.09612C8.45248 1.15146 8.38147 1.22278 8.32649 1.30591C8.27152 1.38904 8.23368 1.4823 8.2152 1.58024C8.19672 1.67817 8.19797 1.77881 8.21887 1.87625C8.23977 1.9737 8.27991 2.06599 8.33692 2.14773C8.39394 2.22947 8.4667 2.29902 8.55093 2.35228C8.63516 2.40555 8.72918 2.44148 8.82747 2.45796C8.92576 2.47444 9.02635 2.47114 9.12335 2.44825C9.22035 2.42537 9.3118 2.38336 9.39236 2.32469C13.4931 -0.491271 18.4642 4.48516 15.6498 8.58287C15.5898 8.66336 15.5467 8.75508 15.5229 8.85257C15.4991 8.95006 15.4951 9.05134 15.5112 9.1504C15.5273 9.24946 15.5631 9.34428 15.6165 9.42923C15.67 9.51417 15.7399 9.58751 15.8223 9.6449C15.9046 9.70228 15.9976 9.74254 16.0958 9.76327C16.194 9.78401 16.2954 9.7848 16.3939 9.76561C16.4924 9.74641 16.586 9.70762 16.6693 9.65154C16.7525 9.59545 16.8236 9.52322 16.8784 9.43912ZM13.9882 8.042C14.1287 7.90152 14.2076 7.71101 14.2076 7.51237C14.2076 7.31373 14.1287 7.12322 13.9882 6.98274L12.7102 5.70399V3.76375C12.7102 3.56507 12.6313 3.37453 12.4908 3.23404C12.3503 3.09356 12.1598 3.01463 11.9611 3.01463C11.7624 3.01463 11.5719 3.09356 11.4314 3.23404C11.2909 3.37453 11.212 3.56507 11.212 3.76375V6.01113C11.212 6.20979 11.291 6.4003 11.4315 6.54076L12.9297 8.03901C13.0702 8.17945 13.2607 8.25834 13.4594 8.25834C13.658 8.25834 13.8485 8.17945 13.989 8.03901L13.9882 8.042Z"
                                                    fill="currentColor" />
                                                </svg>
                                            </span>
                                            {{ $siteSettings->phone }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    {{-- <div class="tp-at-hero-wrapper-box d-flex">
                        <div class="tp-at-hero-card tp-fade-anim" data-delay=".6">
                            <h3 class="tp-at-hero-card-title">
                                <span data-purecounter-duration="3" data-purecounter-end="250"
                                    class="purecounter"></span>%
                            </h3>
                            <span class="tp-at-hero-card-sub">annually</span>
                            <p>Average ROI</p>
                        </div>
                        <div class="tp-at-hero-card style-2 tp-fade-anim" data-delay=".8">
                            <h3 class="tp-at-hero-card-title">
                                <span data-purecounter-duration="2" data-purecounter-end="68"
                                    class="purecounter"></span>%
                            </h3>
                            <span class="tp-at-hero-card-sub">annually</span>
                            <p>Increase reviewee</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>