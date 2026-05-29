@props([
    'faqs' => collect(),
    'id' => 'faqs-section'
])

@if ($faqs->isNotEmpty())
    <div class="tp-fi-faq-ptb tp-sec-ptb pt-130 pb-90">
    <div class="container col-md-10 mx-auto">
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
                        <div class="accordion" id="{{ $id }}">
                            @forelse ($faqs as $faq)
                                <x-faqs.item :faq="$faq" :id="$id" :loop="$loop" />
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex justify-content-lg-end tp-fade-anim" data-delay=".7">
                    <div class="tp-fi-faq-support p-relative" data-bg-color="#F7F7F5">
                        <div class="tp-fi-faq-support-shape">
                            <img src="assets/img/finance/banner/faq-bg.png" alt="">
                        </div>
                        <h3 class="tp-fi-faq-support-title">Hey, do you have any <br> more questions?</h3>
                        <div class="tp-fi-faq-support-list pb-60">
                            <ul>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                            fill="none">
                                            <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Real time performance tracking
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                            fill="none">
                                            <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Automated risk assessment
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                            fill="none">
                                            <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Multi layered security login
                                </li>
                                <li>
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8"
                                            fill="none">
                                            <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    Smart goal setting
                                </li>
                            </ul>
                        </div>
                        <div class="tp-fi-support-btn">
                            <a href="contact.html" class="tp-btn-event">
                                <div class="button-text">Schedule a free consultation</div>
                                <div class="button-icon-wrapper">
                                    <img src="assets/img/finance/hero/btn-arrow.svg" loading="lazy" width="16"
                                        height="16" alt="" class="button-image">
                                    <div class="button-dot"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif