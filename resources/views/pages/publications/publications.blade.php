<main>

    <x-partials::page.header 
        title="{{ $publicationType->name }}"
        description="At Consora, we believe in transforming ideas into impactful digital solutions. As a forward thinking agency, we specialize in empowering businesses to thrive in the digital era. From cutting-edge web development to strategic digital marketing,"
        :breadcrumbs="[
            ['name' => $publicationType->name, 'url' => route('publications', $publicationType)],
        ]"
    />

    <div class="tp-worksheet-ptb tp-worksheet-style tp-sec-ptb pt-135 pb-115">
        <div class="container col-md-10 mx-auto">
            <div class="row g-5">
                <div class="col-md-8 flex flex-col gap-4">
                    <x-sections::publications.list 
                        :publications="$this->publications"
                    />
                </div>

                <div class="col-md-4">
                    <x-partials::publications.sidebar />
                </div>
            </div>
        </div>
    </div>


    <!-- faq area start -->
    <div class="tp-fi-faq-ptb tp-sec-ptb pt-130 pb-90" data-bg-color="#F7F7F5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="tp-fi-faq-wrapper mb-30">
                        <div class="tp-fi-faq-heading mb-60">
                            <span class="tp-section-sub tp-fade-anim">Consora faq</span>
                            <h3 class="tp-section-title" data-text-split data-letters-fade-in>
                                Simplifying complex financial <br> decisions through FAQs.
                            </h3>
                        </div>
                        <div class="tp-faq-wrap tp-fade-anim" data-delay=".5">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-items bg-transparent">
                                    <div class="accordion-header">
                                        <button class="accordion-buttons" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            How do you tailor investment strategies to individual goals?
                                            <span class="tp-faq-icon"></span>
                                        </button>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Our approach is built on deep insight, independent strategy, and
                                                disciplined execution. We combine data-driven
                                                analysis with human judgment, focusing on long-term value rather than
                                                short-term market noise. Every strategy
                                                is tailored, transparent, and designed to adapt as markets evolve.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items bg-transparent">
                                    <div class="accordion-header">
                                        <button class="accordion-buttons collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            What makes your investment approach different from others?
                                            <span class="tp-faq-icon"></span>
                                        </button>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Our approach is built on deep insight, independent strategy, and
                                                disciplined execution. We combine data-driven
                                                analysis with human judgment, focusing on long-term value rather than
                                                short-term market noise. Every strategy
                                                is tailored, transparent, and designed to adapt as markets evolve.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items bg-transparent">
                                    <div class="accordion-header">
                                        <button class="accordion-buttons collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            Is my investment strategy actively monitored and adjusted?
                                            <span class="tp-faq-icon"></span>
                                        </button>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Our approach is built on deep insight, independent strategy, and
                                                disciplined execution. We combine data-driven
                                                analysis with human judgment, focusing on long-term value rather than
                                                short-term market noise. Every strategy
                                                is tailored, transparent, and designed to adapt as markets evolve.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-items bg-transparent">
                                    <div class="accordion-header">
                                        <button class="accordion-buttons collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            How do you balance short-term opportunities with long-term growth?
                                            <span class="tp-faq-icon"></span>
                                        </button>
                                    </div>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <p>
                                                Our approach is built on deep insight, independent strategy, and
                                                disciplined execution. We combine data-driven
                                                analysis with human judgment, focusing on long-term value rather than
                                                short-term market noise. Every strategy
                                                is tailored, transparent, and designed to adapt as markets evolve.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex justify-content-lg-end  tp-fade-anim" data-delay=".7">
                        <div class="tp-fi-faq-support p-relative" data-bg-color="#FFFFFF">
                            <div class="tp-fi-faq-support-shape">
                                <img src="assets/img/finance/banner/faq-bg.png" alt="">
                            </div>
                            <h3 class="tp-fi-faq-support-title">Hey, do you have any <br> more questions?</h3>
                            <div class="tp-fi-faq-support-list pb-60">
                                <ul>
                                    <li>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8"
                                                viewBox="0 0 10 8" fill="none">
                                                <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        Real time performance tracking
                                    </li>
                                    <li>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8"
                                                viewBox="0 0 10 8" fill="none">
                                                <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        Automated risk assessment
                                    </li>
                                    <li>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8"
                                                viewBox="0 0 10 8" fill="none">
                                                <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        Multi layered security login
                                    </li>
                                    <li>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8"
                                                viewBox="0 0 10 8" fill="none">
                                                <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </span>
                                        Smart goal setting
                                    </li>
                                </ul>
                            </div>
                            <div class="tp-fi-support-btn">
                                <a class="tp-btn theme-bg-color tp-btn-switch-animation" href="contact.html">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <span class="btn-text">
                                            Schedule a free consultation
                                        </span>
                                        <i class="btn-icon"></i>
                                        <i class="btn-icon"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- faq area end -->


    <!-- cta area start -->
    <div class="tp-fa-cta-ptb">
        <div class="tp-fa-cta-thumb">
            <img src="{{ asset('assets/img/advisory/cta/thumb.jpg') }}" alt="">
        </div>
    </div>
    <!-- cta area end -->


</main>