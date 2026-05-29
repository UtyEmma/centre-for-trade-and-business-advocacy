<main>
    <x-sections::home.hero />

    <x-sections::home.brands />

    <x-sections::home.about />

    <x-sections::home.services :services="$this->services" />

    <div class="tp-fi-partner-ptb tp-sec-ptb pt-130 pb-90" data-bg-color="#222F30">
        <div class="container col-md-10 mx-auto">
            <div class="row">
                <div class="col-lg-6">
                    <div class="tp-fi-partner-wrapper mb-30">
                        <div class="tp-fi-partner-heading">
                            <span class="tp-section-sub primary-color tp-fade-anim">Trsuted partner</span>
                            <h3 class="tp-section-title white-color" data-text-split data-letters-fade-in>A fully SEC
                                registered
                                investment <br> advisory
                                company worldwide</h3>
                        </div>
                        <div class="tp-fi-partner-wrap">
                            <div class="tp-fade-anim" data-delay=".5">
                                <p>We begin by listening—deeply and intentionally. Every decision is grounded in real
                                    data, market <br>
                                    signals, and human insight, not assumptions or trends for the sake of trends. This
                                    foundation <br>
                                    allows us to understand the true challenges and opportunities.</p>
                            </div>
                            <div class="tp-fi-partner-btn-wrap tp-fade-anim" data-delay=".7">
                                <a href="contact.html" class="tp-btn-event theme-bg-color">
                                    <div class="button-text">Schedule a free consultation</div>
                                    <div class="button-icon-wrapper">
                                        <img src="assets/img/finance/hero/btn-arrow.svg" loading="lazy" width="16"
                                            height="16" alt="" class="button-image">
                                        <div class="button-dot"></div>
                                    </div>
                                </a>
                                <div class="tp-fi-hero-contact">
                                    <a href="tel:01245697">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                viewBox="0 0 18 18" fill="none">
                                                <path
                                                    d="M13.2811 17.9971C7.18994 18.2031 -3.78322 7.31835 1.31157 1.41675L2.17306 0.667624C2.60914 0.246066 3.19368 0.0131721 3.80018 0.0193408C4.40667 0.0255095 4.98635 0.270245 5.41377 0.700585C5.43687 0.724111 5.45839 0.749136 5.47819 0.775498L6.82662 2.5277C7.2364 2.96132 7.46409 3.5357 7.4627 4.13232C7.46131 4.72894 7.23093 5.30225 6.81912 5.73395L5.95164 6.82468C6.43192 7.99112 7.13782 9.05123 8.02883 9.94417C8.91984 10.8371 9.97842 11.5453 11.1438 12.0281L12.2405 11.1554C12.6778 10.7537 13.2498 10.5305 13.8435 10.5296C14.4373 10.5288 15.0098 10.7505 15.4483 11.1509L17.2012 12.4993C17.2274 12.519 17.2524 12.5403 17.2761 12.563C17.7084 12.9993 17.951 13.5886 17.951 14.2028C17.951 14.817 17.7084 15.4063 17.2761 15.8426L16.5937 16.6292C16.1608 17.0668 15.6447 17.4133 15.0757 17.6483C14.5068 17.8832 13.8966 18.0018 13.2811 17.9971ZM3.77394 1.51638C3.66628 1.5163 3.55967 1.53743 3.46018 1.57856C3.36069 1.61969 3.27028 1.68002 3.19412 1.7561L2.33187 2.50523C-1.89768 7.59028 11.0449 19.8122 15.497 15.6059L16.1802 14.8186C16.2614 14.7463 16.3275 14.6587 16.3747 14.5607C16.4219 14.4628 16.4492 14.3565 16.4551 14.2479C16.4611 14.1393 16.4454 14.0307 16.4092 13.9282C16.3729 13.8257 16.3167 13.7314 16.2438 13.6507L14.5006 12.312C14.4739 12.2924 14.4489 12.2706 14.4257 12.2468C14.2694 12.0979 14.0618 12.0148 13.8459 12.0148C13.63 12.0148 13.4224 12.0979 13.2661 12.2468C13.2462 12.267 13.2252 12.286 13.2032 12.3038L11.7364 13.4724C11.6345 13.5535 11.5134 13.6066 11.3848 13.6265C11.2562 13.6465 11.1246 13.6326 11.003 13.5863C9.49284 13.0237 8.12126 12.1431 6.98116 11.0042C5.84106 9.86524 4.95908 8.49455 4.39496 6.98499C4.34502 6.86166 4.32883 6.72726 4.34805 6.59559C4.36727 6.46393 4.42122 6.33977 4.50433 6.23587L5.66847 4.77058C5.68579 4.74838 5.70456 4.72736 5.72466 4.70765C5.87768 4.55332 5.96353 4.34479 5.96353 4.12745C5.96353 3.91012 5.87768 3.70159 5.72466 3.54726C5.70131 3.52396 5.67977 3.49892 5.66023 3.47235L4.32454 1.73138C4.17362 1.59502 3.97734 1.51971 3.77394 1.52013V1.51638ZM16.8784 9.43912C20.6165 3.9368 14.0317 -2.64126 8.53537 1.09612C8.45248 1.15146 8.38147 1.22278 8.32649 1.30591C8.27152 1.38904 8.23368 1.4823 8.2152 1.58024C8.19672 1.67817 8.19797 1.77881 8.21887 1.87625C8.23977 1.9737 8.27991 2.06599 8.33692 2.14773C8.39394 2.22947 8.4667 2.29902 8.55093 2.35228C8.63516 2.40555 8.72918 2.44148 8.82747 2.45796C8.92576 2.47444 9.02635 2.47114 9.12335 2.44825C9.22035 2.42537 9.3118 2.38336 9.39236 2.32469C13.4931 -0.491271 18.4642 4.48516 15.6498 8.58287C15.5898 8.66336 15.5467 8.75508 15.5229 8.85257C15.4991 8.95006 15.4951 9.05134 15.5112 9.1504C15.5273 9.24946 15.5631 9.34428 15.6165 9.42923C15.67 9.51417 15.7399 9.58751 15.8223 9.6449C15.9046 9.70228 15.9976 9.74254 16.0958 9.76327C16.194 9.78401 16.2954 9.7848 16.3939 9.76561C16.4924 9.74641 16.586 9.70762 16.6693 9.65154C16.7525 9.59545 16.8236 9.52322 16.8784 9.43912ZM13.9882 8.042C14.1287 7.90152 14.2076 7.71101 14.2076 7.51237C14.2076 7.31373 14.1287 7.12322 13.9882 6.98274L12.7102 5.70399V3.76375C12.7102 3.56507 12.6313 3.37453 12.4908 3.23404C12.3503 3.09356 12.1598 3.01463 11.9611 3.01463C11.7624 3.01463 11.5719 3.09356 11.4314 3.23404C11.2909 3.37453 11.212 3.56507 11.212 3.76375V6.01113C11.212 6.20979 11.291 6.4003 11.4315 6.54076L12.9297 8.03901C13.0702 8.17945 13.2607 8.25834 13.4594 8.25834C13.658 8.25834 13.8485 8.17945 13.989 8.03901L13.9882 8.042Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        +999 21314 32659
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tp-fi-partner-thumb-wrap text-lg-end p-relative fix mb-30">
                        <div class="main-thumb">
                            <img class="radius-6" src="assets/img/finance/partner/thumb-1.jpg" alt="">
                        </div>
                        <div class="shape-1">
                            <img src="assets/img/finance/partner/brand-1.png" alt="">
                        </div>
                        <div class="tp-fi-hero-shape">
                            <svg xmlns="http://www.w3.org/2000/svg" width="406" height="262" viewBox="0 0 406 262"
                                fill="none" class="tp-svg-drawing">
                                <path
                                    d="M249.625 0.119141C249.437 11.9514 245.962 28.1556 237.267 45.8374M237.267 45.8374C217.65 85.7325 171.465 133.15 76.5343 154.846C-87.4472 192.324 71.0149 34.1117 237.267 45.8374ZM237.267 45.8374C244.642 46.3576 252.033 47.2122 259.411 48.4332C270.013 49.6563 286.689 59.4415 268.585 88.7968C245.955 125.491 3.13843 331.59 346.262 168.913C620.761 38.7704 373.378 199.491 215.374 296.119"
                                    stroke="var(--tp-theme-primary, #CEF79E)" stroke-width="15" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner area start -->
    <div class="tp-fi-banner-ptb">
        <div class="tp-fi-banner-wrapper p-relative fix">
            <img src="assets/img/finance/banner/banner-bg.jpg" alt="">
            <div class="tp-fi-banner-content tp-fade-anim" data-delay=".5" data-fade-from="right">
                <h3 class="tp-fi-banner-title">Superb consulting</h3>
                <p>This year is significant because it provides <br> insight into the history and experience </p>
            </div>
            <div class="tp-cn-success-item-2-shape">
                <img src="assets/img/consulting/success/shape.png" alt="">
            </div>
        </div>
    </div>
    <!-- banner area end -->


    <!-- text slider start -->
    <div class="tp-fi-text-ptb pt-20 pb-20" data-bg-color="#CEF79E">
        <div class="tp-fi-text-slider-wrapper">
            <div class="swiper tp-text-slider-active">
                <div class="swiper-wrapper tp-slide-transtion">
                    <div class="swiper-slide">
                        <div class="tp-fi-text-slider-item">
                            <p>Constantly coming up with new creative idea
                                <i class="ml-30">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M9.5 0.5V9.5H0.5V0.5H9.5Z" stroke="#222F30" />
                                    </svg>
                                </i>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-fi-text-slider-item">
                            <p>Constantly coming up with new creative idea <i class="ml-30"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M9.5 0.5V9.5H0.5V0.5H9.5Z" stroke="#222F30" />
                                    </svg></i>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-fi-text-slider-item">
                            <p>Constantly coming up with new creative idea <i class="ml-30"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M9.5 0.5V9.5H0.5V0.5H9.5Z" stroke="#222F30" />
                                    </svg></i>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-fi-text-slider-item">
                            <p>Constantly coming up with new creative idea <i class="ml-30"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M9.5 0.5V9.5H0.5V0.5H9.5Z" stroke="#222F30" />
                                    </svg></i>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-fi-text-slider-item">
                            <p>Constantly coming up with new creative idea <i class="ml-30"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M9.5 0.5V9.5H0.5V0.5H9.5Z" stroke="#222F30" />
                                    </svg></i>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-fi-text-slider-item">
                            <p>Constantly coming up with new creative idea <i class="ml-30"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M9.5 0.5V9.5H0.5V0.5H9.5Z" stroke="#222F30" />
                                    </svg></i>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="tp-fi-text-slider-item">
                            <p>Constantly coming up with new creative idea <i class="ml-30"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10"
                                        fill="none">
                                        <path d="M9.5 0.5V9.5H0.5V0.5H9.5Z" stroke="#222F30" />
                                    </svg></i>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- text slider end -->

    <x-sections::home.core-values />

    <x-sections::home.testimonials />

    <!-- team area start -->
    <x-sections::teams />
    <!-- team area end -->


    <!-- banner area start -->
    <div class="tp-fi-banner-ptb">
        <div class="tp-fi-banner-wrapper">
            <img src="assets/img/finance/banner/banner-bg-2.jpg" alt="">
        </div>
        <div class="tp-fi-banner-wrap" data-bg-color="#222F30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <p class="tp-fi-banner-text">
                            <span class="video">
                                <a href="https://vimeo.com/706869971?fl=pl&amp;fe=cm" class="popup-video">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="9" viewBox="0 0 8 9"
                                        fill="none">
                                        <path
                                            d="M7.07143 5.08418C7.73809 4.69928 7.7381 3.73703 7.07143 3.35213L1.5 0.135466C0.833334 -0.249434 0 0.231691 0 1.00149V7.43482C0 8.20462 0.833333 8.68575 1.5 8.30085L7.07143 5.08418Z"
                                            fill="#222F30" />
                                    </svg>
                                </a>
                            </span>
                            Let’s make something great work together.
                            <a class="link tp-btn-underline" href="case-studies.html">Got a project in mind?</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area end -->


    <x-sections::faqs :faqs="$this->faqs" />

    <x-sections::home.blog :posts="$this->posts" />

    <x-sections::home.newsletter />
</main>