<main>
    <x-sections::home.hero />

    <x-sections::home.brands />

    <x-sections::home.about />

    <x-sections::home.services :services="$this->services" />

    <x-sections::home.approach  />

    <x-sections::home.banner />

    <x-sections::home.marquee />

    <x-sections::home.how-we-work />

    <x-sections::home.testimonials />

    <!-- team area start -->
    <x-sections::teams :teamMembers="$this->teamMembers" />
    <!-- team area end -->


    <!-- banner area start -->
    {{-- <div class="tp-fi-banner-ptb">
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
    </div> --}}
    <!-- banner area end -->


    <x-sections::faqs :faqs="$this->faqs" />

    <x-sections::home.blog :posts="$this->posts" />

    <x-sections::home.newsletter />
</main>