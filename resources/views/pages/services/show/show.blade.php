<main>
   <x-partials::page.header :title="$service->title" :description="$service->summary" :breadcrumbs="[
      ['name' => 'What We Do', 'url' => route('services')],
      ['name' => $service->title],
   ]" />


   <!-- philosophy area start -->
   <div class="tp-service-philosopy-ptb tp-sec-ptb pt-135 pb-110">
      <div class="container col-md-10 mx-auto">
         <div class="row">
            <div class="col-lg-7">
               <div class="tp-service-philosopy-heading mb-30">
                  <span class="tp-section-sub tp-fade-anim">Consora philosophy</span>
                  <h3 class="tp-section-title mb-20" data-text-split data-letters-fade-in>
                     {{ $service->title }}
                  </h3>
                  <div class="tp-fade-anim" data-delay=".5">
                     <p class="mb-70">We conduct a comprehensive evaluation of your financial position, aligning <br>
                        short-term goals with long-term aspirations while considering family <br>
                        structure and changing priorities. Our expert team guides you.</p>
                  </div>
                  <div class="tp-fade-anim" data-delay=".7">
                     <a class="tp-btn tp-btn-switch-animation" href="contact.html">
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
            <div class="col-lg-5">
               <div class="tp-service-philosopy-faq mb-30">
                  <div class="tp-faq-wrap tp-fade-anim" data-delay=".5">
                     <div class="accordion" id="accordionExample">
                        <div class="accordion-items">
                           <div class="accordion-header">
                              <button class="accordion-buttons" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 Transparent fee based advisory
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseOne" class="accordion-collapse collapse show"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    As fiduciary advisors, we are legally bound to place your financial interests first.
                                    Every recommendation is made solely with your benefit in mind,
                                    ensuring objective and conflict-free guidance.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-items">
                           <div class="accordion-header">
                              <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 Client first fiduciary guidance
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    As fiduciary advisors, we are legally bound to place your financial interests first.
                                    Every recommendation is made solely with your benefit in mind,
                                    ensuring objective and conflict-free guidance.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-items">
                           <div class="accordion-header">
                              <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Advisors only, zero sales pressure
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseThree" class="accordion-collapse collapse"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    As fiduciary advisors, we are legally bound to place your financial interests first.
                                    Every recommendation is made solely with your benefit in mind,
                                    ensuring objective and conflict-free guidance.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-items">
                           <div class="accordion-header">
                              <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                 data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 Conflict free financial advice
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseFour" class="accordion-collapse collapse"
                              data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    As fiduciary advisors, we are legally bound to place your financial interests first.
                                    Every recommendation is made solely with your benefit in mind,
                                    ensuring objective and conflict-free guidance.
                                 </p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- philosophy area end -->

   <!-- about area start -->
   {{-- <div class="tp-fa-about-ptb">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="tp-fa-about-thumb-wrapper p-relative radius-6">
                  <div class="tp-fa-about-shape">
                     <img src="assets/img/advisory/about/thumb-2.png" alt="">
                  </div>
                  <video loop="" muted="" autoplay="" playsinline="">
                     <source src="https://html.aqlova.com/videos/consora/advisory-about.mp4" type="video/mp4">
                  </video>
                  <div class="tp-fi-about-list">
                     <div class="tp-fi-about-list-item">
                        <p>
                           <i>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="9" viewBox="0 0 12 9"
                                 fill="none">
                                 <path d="M10.75 0.75L3.875 7.75L0.75 4.56818" stroke="#222F30" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                           </i>
                           Easy management and access
                        </p>
                     </div>
                     <div class="tp-fi-about-list-item">
                        <p>
                           <i>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="9" viewBox="0 0 12 9"
                                 fill="none">
                                 <path d="M10.75 0.75L3.875 7.75L0.75 4.56818" stroke="#222F30" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                           </i>
                           Compliance and regulatory consulting
                        </p>
                     </div>
                     <div class="tp-fi-about-list-item">
                        <p>
                           <i>
                              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="9" viewBox="0 0 12 9"
                                 fill="none">
                                 <path d="M10.75 0.75L3.875 7.75L0.75 4.56818" stroke="#222F30" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>
                           </i>
                           Strong security systems
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
   <!-- about area end -->
   <div class="tp-at-service-ptb tp-sec-ptb include-bg pt-135 pb-100" data-bg-color="#F7F7F5" data-background="{{ asset('assets/img/accounting/service/service-bg.png') }}">
      <div class="container col-md-10 mx-auto">
         <div class="row">
            <div class="col-lg-6">
               <div class="tp-at-service-wrapper mb-40">
                  <div class="tp-at-service-heading mb-140">
                     <span class="tp-section-sub tp-fade-anim">// Our services</span>
                     <h3 class="tp-section-title" data-text-split data-letters-fade-in>Revolutionize your workflow with bookkeeping solutions.</h3>
                  </div>
                  <div class="tp-at-service-thumb-wrap d-flex gap-3">
                     <div class="tp-at-service-thumb">
                        <img class="radius-6" src="{{ asset('assets/img/accounting/service/thumb-1.jpg') }}" alt="service">
                     </div>
                     <div class="tp-at-service-thumb">
                        <img class="radius-6" src="{{ asset('assets/img/accounting/service/thumb-2.jpg') }}" alt="service">
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="tp-at-service-wrap mb-40">
                  <div class="tp-industries-service-text mb-80">
                     <p class="mb-25">
                        The Advanced Manufacturing sector is experiencing unprecedented disruption as five
                        pivotal trends (outlined in our “5 RACES” framework) transform both industry and
                        society. To thrive, companies must strategically decide where to stand out and where to
                        collaborate—even with competitors—through innovative partnerships.
                        Success now requires more than fine-tuning traditional value chains; it demands
                        end-to-end transformation: putting customers at the center, deploying the right digital
                        technologies, and reimagining the organization from the C-suite to the shop floor.
                     </p>
                     <p>
                        In this fast-changing environment, our automotive consulting specialists collaborate
                        with vehicle manufacturers, suppliers, retailers, tech innovators, and mobility service
                        providers to design bold, forward-looking strategies. We empower businesses to
                        maximize current performance while building resilience and positioning them to capture
                        tomorrow’s opportunities. By aligning technology, talent, and strategy, we help
                        organizations transform challenges into competitive advantage
                        and future-proof their growth.
                     </p>
                  </div>
                  <div class="tp-industires-btn">
                     <a class="tp-btn theme-bg-color tp-btn-switch-animation" href="contact.html">
                        <span class="d-flex align-items-center justify-content-center">
                           <span class="btn-text">
                              Schedule a free call
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


   <!-- control area start -->
   <div class="tp-fa-control-ptb tp-sec-ptb pt-130 pb-90">
      <div class="tp-fa-control-top tp-sec-line">
         <div class="container col-md-10 mx-auto">
            <div class="row align-items-end">
               <div class="col-lg-6">
                  <div class="tp-fa-control-heading mb-60">
                     <h3 class="tp-section-title advisory-color" data-text-split data-letters-fade-in>Complete control
                        over your <br> finances on the go.</h3>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div
                     class="tp-fa-control-right d-flex flex-wrap gap-lg-5 gap-3 align-items-center justify-content-lg-end mb-60 tp-fade-anim"
                     data-delay=".5">
                     <div class="tp-fi-hero-contact">
                        <a href="tel:01245697">
                           <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                 fill="none">
                                 <path
                                    d="M13.2811 17.9971C7.18994 18.2031 -3.78322 7.31835 1.31157 1.41675L2.17306 0.667624C2.60914 0.246066 3.19368 0.0131721 3.80018 0.0193408C4.40667 0.0255095 4.98635 0.270245 5.41377 0.700585C5.43687 0.724111 5.45839 0.749136 5.47819 0.775498L6.82662 2.5277C7.2364 2.96132 7.46409 3.5357 7.4627 4.13232C7.46131 4.72894 7.23093 5.30225 6.81912 5.73395L5.95164 6.82468C6.43192 7.99112 7.13782 9.05123 8.02883 9.94417C8.91984 10.8371 9.97842 11.5453 11.1438 12.0281L12.2405 11.1554C12.6778 10.7537 13.2498 10.5305 13.8435 10.5296C14.4373 10.5288 15.0098 10.7505 15.4483 11.1509L17.2012 12.4993C17.2274 12.519 17.2524 12.5403 17.2761 12.563C17.7084 12.9993 17.951 13.5886 17.951 14.2028C17.951 14.817 17.7084 15.4063 17.2761 15.8426L16.5937 16.6292C16.1608 17.0668 15.6447 17.4133 15.0757 17.6483C14.5068 17.8832 13.8966 18.0018 13.2811 17.9971ZM3.77394 1.51638C3.66628 1.5163 3.55967 1.53743 3.46018 1.57856C3.36069 1.61969 3.27028 1.68002 3.19412 1.7561L2.33187 2.50523C-1.89768 7.59028 11.0449 19.8122 15.497 15.6059L16.1802 14.8186C16.2614 14.7463 16.3275 14.6587 16.3747 14.5607C16.4219 14.4628 16.4492 14.3565 16.4551 14.2479C16.4611 14.1393 16.4454 14.0307 16.4092 13.9282C16.3729 13.8257 16.3167 13.7314 16.2438 13.6507L14.5006 12.312C14.4739 12.2924 14.4489 12.2706 14.4257 12.2468C14.2694 12.0979 14.0618 12.0148 13.8459 12.0148C13.63 12.0148 13.4224 12.0979 13.2661 12.2468C13.2462 12.267 13.2252 12.286 13.2032 12.3038L11.7364 13.4724C11.6345 13.5535 11.5134 13.6066 11.3848 13.6265C11.2562 13.6465 11.1246 13.6326 11.003 13.5863C9.49284 13.0237 8.12126 12.1431 6.98116 11.0042C5.84106 9.86524 4.95908 8.49455 4.39496 6.98499C4.34502 6.86166 4.32883 6.72726 4.34805 6.59559C4.36727 6.46393 4.42122 6.33977 4.50433 6.23587L5.66847 4.77058C5.68579 4.74838 5.70456 4.72736 5.72466 4.70765C5.87768 4.55332 5.96353 4.34479 5.96353 4.12745C5.96353 3.91012 5.87768 3.70159 5.72466 3.54726C5.70131 3.52396 5.67977 3.49892 5.66023 3.47235L4.32454 1.73138C4.17362 1.59502 3.97734 1.51971 3.77394 1.52013V1.51638ZM16.8784 9.43912C20.6165 3.9368 14.0317 -2.64126 8.53537 1.09612C8.45248 1.15146 8.38147 1.22278 8.32649 1.30591C8.27152 1.38904 8.23368 1.4823 8.2152 1.58024C8.19672 1.67817 8.19797 1.77881 8.21887 1.87625C8.23977 1.9737 8.27991 2.06599 8.33692 2.14773C8.39394 2.22947 8.4667 2.29902 8.55093 2.35228C8.63516 2.40555 8.72918 2.44148 8.82747 2.45796C8.92576 2.47444 9.02635 2.47114 9.12335 2.44825C9.22035 2.42537 9.3118 2.38336 9.39236 2.32469C13.4931 -0.491271 18.4642 4.48516 15.6498 8.58287C15.5898 8.66336 15.5467 8.75508 15.5229 8.85257C15.4991 8.95006 15.4951 9.05134 15.5112 9.1504C15.5273 9.24946 15.5631 9.34428 15.6165 9.42923C15.67 9.51417 15.7399 9.58751 15.8223 9.6449C15.9046 9.70228 15.9976 9.74254 16.0958 9.76327C16.194 9.78401 16.2954 9.7848 16.3939 9.76561C16.4924 9.74641 16.586 9.70762 16.6693 9.65154C16.7525 9.59545 16.8236 9.52322 16.8784 9.43912ZM13.9882 8.042C14.1287 7.90152 14.2076 7.71101 14.2076 7.51237C14.2076 7.31373 14.1287 7.12322 13.9882 6.98274L12.7102 5.70399V3.76375C12.7102 3.56507 12.6313 3.37453 12.4908 3.23404C12.3503 3.09356 12.1598 3.01463 11.9611 3.01463C11.7624 3.01463 11.5719 3.09356 11.4314 3.23404C11.2909 3.37453 11.212 3.56507 11.212 3.76375V6.01113C11.212 6.20979 11.291 6.4003 11.4315 6.54076L12.9297 8.03901C13.0702 8.17945 13.2607 8.25834 13.4594 8.25834C13.658 8.25834 13.8485 8.17945 13.989 8.03901L13.9882 8.042Z"
                                    fill="currentColor"></path>
                              </svg>
                           </span>
                           +999 21314 32659
                        </a>
                     </div>
                     <div class="tp-fa-control-btn">
                        <a class="tp-btn tp-btn-advisory-style tp-btn-border tp-btn-switch-animation"
                           href="contact.html">
                           <span class="d-flex align-items-center justify-content-center">
                              <span class="btn-text">
                                 Learn more
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
      <div class="tp-fa-control-bottom mt-50">
         <div class="container col-md-10 mx-auto">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="tp-fa-control-item mb-30 tp-fade-anim">
                     <div class="tp-fa-control-item-icon">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="21" height="26" viewBox="0 0 21 26"
                              fill="none">
                              <path
                                 d="M1.4808 15.54C1.69618 15.8938 2.15761 16.006 2.51142 15.7906C2.86523 15.5752 2.97745 15.1138 2.76206 14.76L2.12143 15.15L1.4808 15.54ZM17.9379 14.76C17.7225 15.1138 17.8347 15.5752 18.1885 15.7906C18.5423 16.006 19.0037 15.8938 19.2191 15.54L18.5785 15.15L17.9379 14.76ZM4.80944 18.8678L5.52121 18.6314V18.6314L4.80944 18.8678ZM4.6505 18.2356L5.39965 18.2713V18.2713L4.6505 18.2356ZM5.10788 17.5986L4.83622 16.8995L4.83611 16.8996L5.10788 17.5986ZM15.5921 17.5986L15.3204 18.2977L15.3204 18.2977L15.5921 17.5986ZM16.0495 18.2356L16.7987 18.2001L16.7987 18.1998L16.0495 18.2356ZM15.8905 18.8678L15.1788 18.6314L15.1788 18.6314L15.8905 18.8678ZM15.4278 20.0364L14.794 19.6354L14.794 19.6354L15.4278 20.0364ZM13.9867 21.079L14.1684 21.8066L14.1686 21.8066L13.9867 21.079ZM6.71333 21.079L6.5315 21.8066L6.53161 21.8066L6.71333 21.079ZM5.2722 20.0364L5.90601 19.6354L5.90593 19.6353L5.2722 20.0364ZM13.7948 21.9259L14.5303 22.073L14.5303 22.073L13.7948 21.9259ZM13.3501 23.5339L12.6978 23.1639L12.6977 23.164L13.3501 23.5339ZM12.0139 24.6293L11.7791 23.917L11.779 23.917L12.0139 24.6293ZM8.68608 24.6293L8.92101 23.917L8.92094 23.917L8.68608 24.6293ZM7.34984 23.5339L6.69743 23.9039L6.69747 23.9039L7.34984 23.5339ZM6.90518 21.9259L7.64062 21.7788L7.64062 21.7788L6.90518 21.9259ZM9.6 17.55C9.6 17.9642 9.93579 18.3 10.35 18.3C10.7642 18.3 11.1 17.9642 11.1 17.55H10.35H9.6ZM11.1 11.55C11.1 11.1358 10.7642 10.8 10.35 10.8C9.93579 10.8 9.6 11.1358 9.6 11.55H10.35H11.1ZM2.12143 15.15L2.76206 14.76C1.96077 13.4437 1.5 11.9024 1.5 10.2526H0.75H0C0 12.1859 0.540872 13.996 1.4808 15.54L2.12143 15.15ZM0.75 10.2526H1.5C1.5 5.42587 5.45505 1.5 10.35 1.5V0.75V0C4.64108 0 0 4.58306 0 10.2526H0.75ZM10.35 0.75V1.5C15.245 1.5 19.2 5.42587 19.2 10.2526H19.95H20.7C20.7 4.58307 16.0589 0 10.35 0V0.75ZM19.95 10.2526H19.2C19.2 11.9024 18.7393 13.4437 17.9379 14.76L18.5785 15.15L19.2191 15.54C20.1592 13.996 20.7 12.1859 20.7 10.2526H19.95ZM4.80944 18.8678L5.52121 18.6314C5.46323 18.4569 5.43034 18.3569 5.41063 18.2834C5.39123 18.211 5.40192 18.2238 5.39965 18.2713L4.6505 18.2356L3.90136 18.1998C3.89266 18.3818 3.9277 18.5447 3.96182 18.6719C3.99562 18.7979 4.04541 18.9469 4.09768 19.1042L4.80944 18.8678ZM4.6505 18.2356L5.39965 18.2713C5.39916 18.2816 5.39257 18.2926 5.37965 18.2976L5.10788 17.5986L4.83611 16.8996C4.29416 17.1103 3.92901 17.6208 3.90136 18.1998L4.6505 18.2356ZM5.10788 17.5986L5.37954 18.2977C5.33432 18.3152 5.31807 18.3092 5.3923 18.3048C5.46777 18.3003 5.57245 18.3 5.75588 18.3V17.55V16.8C5.59069 16.8 5.43391 16.7997 5.3038 16.8074C5.17245 16.8151 5.00651 16.8334 4.83622 16.8995L5.10788 17.5986ZM5.75588 17.55V18.3H14.9441V17.55V16.8H5.75588V17.55ZM14.9441 17.55V18.3C15.1276 18.3 15.2322 18.3003 15.3077 18.3048C15.3819 18.3092 15.3656 18.3152 15.3204 18.2977L15.5921 17.5986L15.8638 16.8995C15.6935 16.8334 15.5276 16.8151 15.3962 16.8074C15.2661 16.7997 15.1093 16.8 14.9441 16.8V17.55ZM15.5921 17.5986L15.3204 18.2977C15.3075 18.2927 15.3009 18.2816 15.3004 18.2713L16.0495 18.2356L16.7987 18.1998C16.7711 17.6207 16.4058 17.1102 15.8638 16.8995L15.5921 17.5986ZM16.0495 18.2356L15.3004 18.271C15.2981 18.2236 15.3088 18.211 15.2894 18.2834C15.2696 18.3568 15.2367 18.4569 15.1788 18.6314L15.8905 18.8678L16.6023 19.1043C16.6546 18.9469 16.7043 18.798 16.7382 18.6719C16.7723 18.5447 16.8073 18.3819 16.7987 18.2001L16.0495 18.2356ZM15.8905 18.8678L15.1788 18.6314C14.9621 19.2836 14.8901 19.4835 14.794 19.6354L15.4278 20.0364L16.0616 20.4374C16.2796 20.0928 16.4114 19.6789 16.6023 19.1043L15.8905 18.8678ZM15.4278 20.0364L14.794 19.6354C14.5676 19.9933 14.2132 20.2493 13.8049 20.3513L13.9867 21.079L14.1686 21.8066C14.952 21.6108 15.6297 21.1202 16.0616 20.4374L15.4278 20.0364ZM13.9867 21.079L13.805 20.3513C13.6317 20.3946 13.4209 20.4 12.7357 20.4V21.15V21.9C13.3391 21.9 13.7727 21.9054 14.1684 21.8066L13.9867 21.079ZM12.7357 21.15V20.4H7.96428V21.15V21.9H12.7357V21.15ZM7.96428 21.15V20.4C7.27904 20.4 7.06836 20.3946 6.89504 20.3513L6.71333 21.079L6.53161 21.8066C6.92724 21.9054 7.36084 21.9 7.96428 21.9V21.15ZM6.71333 21.079L6.89516 20.3513C6.48677 20.2493 6.13239 19.9933 5.90601 19.6354L5.2722 20.0364L4.63838 20.4374C5.07036 21.1202 5.74802 21.6108 6.5315 21.8066L6.71333 21.079ZM5.2722 20.0364L5.90593 19.6353C5.8098 19.4834 5.73784 19.2837 5.52121 18.6314L4.80944 18.8678L4.09768 19.1042C4.28854 19.6789 4.42032 20.0928 4.63846 20.4375L5.2722 20.0364ZM13.95 21.15L13.2146 21.0029L13.0594 21.7789L13.7948 21.9259L14.5303 22.073L14.6854 21.2971L13.95 21.15ZM13.7948 21.9259L13.0594 21.7789C12.8788 22.682 12.8139 22.9591 12.6978 23.1639L13.3501 23.5339L14.0025 23.904C14.2667 23.4381 14.3715 22.8669 14.5303 22.073L13.7948 21.9259ZM13.3501 23.5339L12.6977 23.164C12.4957 23.5202 12.1682 23.7887 11.7791 23.917L12.0139 24.6293L12.2488 25.3416C12.9915 25.0967 13.6168 24.5842 14.0025 23.9039L13.3501 23.5339ZM12.0139 24.6293L11.779 23.917C11.5555 23.9907 11.271 24 10.35 24V24.75V25.5C11.1596 25.5 11.7403 25.5093 12.2488 25.3415L12.0139 24.6293ZM10.35 24.75V24C9.42896 24 9.14446 23.9907 8.92101 23.917L8.68608 24.6293L8.45115 25.3415C8.9597 25.5093 9.5404 25.5 10.35 25.5V24.75ZM8.68608 24.6293L8.92094 23.917C8.53183 23.7887 8.20431 23.5202 8.00221 23.1639L7.34984 23.5339L6.69747 23.9039C7.08331 24.5842 7.70849 25.0967 8.45122 25.3416L8.68608 24.6293ZM7.34984 23.5339L8.00226 23.164C7.88614 22.9592 7.82123 22.6819 7.64062 21.7788L6.90518 21.9259L6.16975 22.073C6.32853 22.8669 6.43332 23.4381 6.69743 23.9039L7.34984 23.5339ZM6.90518 21.9259L7.64062 21.7788L7.48544 21.0029L6.75 21.15L6.01456 21.2971L6.16975 22.073L6.90518 21.9259ZM10.35 17.55H11.1V11.55H10.35H9.6V17.55H10.35Z"
                                 fill="#1B3942" />
                           </svg>
                        </span>
                     </div>
                     <div class="tp-fa-control-item-content">
                        <h3 class="tp-fa-control-item-title">Personalized solutions</h3>
                        <p>Usability refers to the measurement of how easily and efficiently a user can accomplish their
                           goals when using a product, system.</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="tp-fa-control-item mb-30 tp-fade-anim" data-delay=".5">
                     <div class="tp-fa-control-item-icon">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                              fill="none">
                              <path
                                 d="M5.05263 19.6974C5.05263 20.1116 5.38842 20.4474 5.80263 20.4474C6.21685 20.4474 6.55263 20.1116 6.55263 19.6974H5.80263H5.05263ZM6.55263 15.9079C6.55263 15.4937 6.21685 15.1579 5.80263 15.1579C5.38842 15.1579 5.05263 15.4937 5.05263 15.9079H5.80263H6.55263ZM11.3684 19.6974C11.3684 20.1116 11.7042 20.4474 12.1184 20.4474C12.5326 20.4474 12.8684 20.1116 12.8684 19.6974H12.1184H11.3684ZM12.8684 8.32895C12.8684 7.91473 12.5326 7.57895 12.1184 7.57895C11.7042 7.57895 11.3684 7.91473 11.3684 8.32895H12.1184H12.8684ZM17.6842 19.6974C17.6842 20.1116 18.02 20.4474 18.4342 20.4474C18.8484 20.4474 19.1842 20.1116 19.1842 19.6974H18.4342H17.6842ZM19.1842 14.6447C19.1842 14.2305 18.8484 13.8947 18.4342 13.8947C18.02 13.8947 17.6842 14.2305 17.6842 14.6447H18.4342H19.1842ZM25.4942 11.4769C25.4888 11.0627 25.1486 10.7314 24.7344 10.7369C24.3202 10.7424 23.9889 11.0826 23.9944 11.4968L24.7443 11.4868L25.4942 11.4769ZM22.9927 22.9927L23.523 23.523L23.523 23.523L22.9927 22.9927ZM2.50736 22.9927L1.97701 23.523L1.97704 23.523L2.50736 22.9927ZM2.50736 2.50739L1.97703 1.97706L1.97702 1.97707L2.50736 2.50739ZM12.75 0.750038V1.50004H12.75L12.75 0.750038ZM14.0132 1.5C14.4274 1.49999 14.7632 1.16419 14.7632 0.749977C14.7631 0.335764 14.4273 -1.24574e-05 14.0131 0L14.0132 0.75L14.0132 1.5ZM5.80263 19.6974H6.55263V15.9079H5.80263H5.05263V19.6974H5.80263ZM12.1184 19.6974H12.8684V8.32895H12.1184H11.3684V19.6974H12.1184ZM18.4342 19.6974H19.1842V14.6447H18.4342H17.6842V19.6974H18.4342ZM24.75 4.53947H24C24 6.21813 22.6392 7.57895 20.9605 7.57895V8.32895V9.07895C23.4677 9.07895 25.5 7.04654 25.5 4.53947H24.75ZM20.9605 8.32895V7.57895C19.2818 7.57895 17.9211 6.21813 17.9211 4.53947H17.1711H16.4211C16.4211 7.04654 18.4534 9.07895 20.9605 9.07895V8.32895ZM17.1711 4.53947H17.9211C17.9211 2.86082 19.2818 1.5 20.9605 1.5V0.75V0C18.4534 0 16.4211 2.03241 16.4211 4.53947H17.1711ZM20.9605 0.75V1.5C22.6392 1.5 24 2.86082 24 4.53947H24.75H25.5C25.5 2.03241 23.4677 0 20.9605 0V0.75ZM24.7443 11.4868C23.9944 11.4968 23.9944 11.4968 23.9944 11.4968C23.9944 11.4968 23.9944 11.4968 23.9944 11.4968C23.9944 11.4968 23.9944 11.4968 23.9944 11.4968C23.9944 11.4968 23.9944 11.4969 23.9944 11.4969C23.9944 11.4971 23.9944 11.4974 23.9944 11.4977C23.9944 11.4985 23.9944 11.4996 23.9944 11.5012C23.9945 11.5043 23.9945 11.5091 23.9946 11.5156C23.9948 11.5286 23.995 11.5482 23.9952 11.5744C23.9958 11.6268 23.9965 11.7057 23.9972 11.8106C23.9986 12.0204 24 12.3345 24 12.75H24.75H25.5C25.5 12.3311 25.4986 12.0137 25.4971 11.8005C25.4964 11.6939 25.4957 11.6134 25.4952 11.5594C25.4949 11.5323 25.4947 11.5119 25.4945 11.4982C25.4944 11.4913 25.4944 11.4861 25.4943 11.4825C25.4943 11.4808 25.4943 11.4794 25.4943 11.4785C25.4943 11.478 25.4943 11.4776 25.4943 11.4774C25.4943 11.4772 25.4943 11.4771 25.4943 11.4771C25.4943 11.477 25.4943 11.477 25.4943 11.477C25.4943 11.4769 25.4943 11.4769 25.4943 11.4769C25.4943 11.4769 25.4942 11.4769 24.7443 11.4868ZM24.75 12.75H24C24 15.5997 23.9984 17.6614 23.787 19.2337C23.5785 20.7844 23.1784 21.7462 22.4623 22.4624L22.9927 22.9927L23.523 23.523C24.5643 22.4817 25.0428 21.1506 25.2736 19.4336C25.5016 17.7381 25.5 15.5573 25.5 12.75H24.75ZM22.9927 22.9927L22.4624 22.4623C21.7462 23.1784 20.7844 23.5785 19.2337 23.787C17.6614 23.9984 15.5996 24 12.75 24V24.75V25.5C15.5572 25.5 17.7381 25.5016 19.4335 25.2736C21.1506 25.0428 22.4817 24.5643 23.523 23.523L22.9927 22.9927ZM12.75 24.75V24C9.90037 24 7.8386 23.9984 6.2663 23.787C4.71558 23.5785 3.75378 23.1784 3.03768 22.4624L2.50736 22.9927L1.97704 23.523C3.0183 24.5643 4.34939 25.0428 6.06644 25.2736C7.76191 25.5016 9.94278 25.5 12.75 25.5V24.75ZM2.50736 22.9927L3.0377 22.4624C2.32158 21.7462 1.92147 20.7844 1.71298 19.2337C1.50159 17.6614 1.5 15.5997 1.5 12.75H0.75H0C0 15.5573 -0.00159281 17.7381 0.226357 19.4336C0.457209 21.1506 0.935772 22.4817 1.97701 23.523L2.50736 22.9927ZM0.75 12.75H1.5C1.5 9.90039 1.50159 7.83863 1.71298 6.26634C1.92147 4.71563 2.32158 3.75383 3.03769 3.03772L2.50736 2.50739L1.97702 1.97707C0.935771 3.01833 0.457208 4.34942 0.226357 6.06647C-0.00159281 7.76194 0 9.9428 0 12.75H0.75ZM2.50736 2.50739L3.03768 3.03773C3.75379 2.32162 4.71559 1.92151 6.26631 1.71302C7.8386 1.50163 9.90037 1.50004 12.75 1.50004V0.750038V3.79682e-05C9.94278 3.79682e-05 7.76191 -0.00155491 6.06644 0.226395C4.34939 0.457246 3.01829 0.935808 1.97703 1.97706L2.50736 2.50739ZM12.75 0.750038L12.75 1.50004L14.0132 1.5L14.0132 0.75L14.0131 0L12.75 3.79682e-05L12.75 0.750038Z"
                                 fill="#1B3942" />
                           </svg>
                        </span>
                     </div>
                     <div class="tp-fa-control-item-content">
                        <h3 class="tp-fa-control-item-title">Comprehensive reporting</h3>
                        <p>Usability refers to the measurement of how easily and efficiently a user can accomplish their
                           goals when using a product, system.</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="tp-fa-control-item mb-30 tp-fade-anim" data-delay=".7">
                     <div class="tp-fa-control-item-icon">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26"
                              fill="none">
                              <path
                                 d="M10.35 17.55L11.0615 17.3128C10.9594 17.0066 10.6728 16.8 10.35 16.8V17.55ZM0.75 17.55V16.8C0.508917 16.8 0.282532 16.9159 0.141568 17.1115C0.000604868 17.307 -0.0377495 17.5585 0.0384876 17.7872L0.75 17.55ZM3.15 24.75L2.43849 24.9872C2.54057 25.2934 2.82718 25.5 3.15 25.5V24.75ZM17.55 25.5C17.9642 25.5 18.3 25.1642 18.3 24.75C18.3 24.3358 17.9642 24 17.55 24V24.75V25.5ZM12 13.95C12 14.3642 12.3358 14.7 12.75 14.7C13.1642 14.7 13.5 14.3642 13.5 13.95H12.75H12ZM12.047 9.25295L11.5167 9.78328L11.5167 9.78329L12.047 9.25295ZM3.85295 9.25295L4.38327 9.78328L4.38328 9.78327L3.85295 9.25295ZM2.4 13.95C2.4 14.3642 2.73579 14.7 3.15 14.7C3.56421 14.7 3.9 14.3642 3.9 13.95H3.15H2.4ZM15.15 18.6C14.7358 18.6 14.4 18.9358 14.4 19.35C14.4 19.7642 14.7358 20.1 15.15 20.1V19.35V18.6ZM21.15 24C20.7358 24 20.4 24.3358 20.4 24.75C20.4 25.1642 20.7358 25.5 21.15 25.5V24.75V24ZM12.75 24.75L13.4615 24.5128L11.0615 17.3128L10.35 17.55L9.63849 17.7872L12.0385 24.9872L12.75 24.75ZM10.35 17.55V16.8H0.75V17.55V18.3H10.35V17.55ZM0.75 17.55L0.0384876 17.7872L2.43849 24.9872L3.15 24.75L3.86151 24.5128L1.46151 17.3128L0.75 17.55ZM3.15 24.75V25.5H12.75V24.75V24H3.15V24.75ZM12.75 24.75V25.5H17.55V24.75V24H12.75V24.75ZM12.75 13.95H13.5V13.35H12.75H12V13.95H12.75ZM12.75 13.35H13.5C13.5 12.2398 13.5016 11.3318 13.4054 10.6166C13.3064 9.8799 13.0914 9.23666 12.5774 8.72261L12.047 9.25295L11.5167 9.78329C11.7056 9.97218 11.8421 10.2461 11.9188 10.8165C11.9984 11.4085 12 12.1974 12 13.35H12.75ZM12.047 9.25295L12.5774 8.72261C12.0633 8.20857 11.4201 7.99361 10.6834 7.89456C9.96824 7.79841 9.06017 7.8 7.95 7.8V8.55V9.3C9.10258 9.3 9.89155 9.30159 10.4835 9.38118C11.0539 9.45787 11.3278 9.59438 11.5167 9.78328L12.047 9.25295ZM7.95 8.55V7.8C6.83983 7.8 5.93175 7.79841 5.21661 7.89456C4.47989 7.99361 3.83666 8.20857 3.32261 8.72262L3.85295 9.25295L4.38328 9.78327C4.57217 9.59438 4.8461 9.45787 5.41648 9.38118C6.00844 9.30159 6.79743 9.3 7.95 9.3V8.55ZM3.85295 9.25295L3.32262 8.72261C2.80857 9.23666 2.59361 9.8799 2.49456 10.6166C2.39841 11.3318 2.4 12.2398 2.4 13.35H3.15H3.9C3.9 12.1974 3.90159 11.4085 3.98118 10.8165C4.05787 10.2461 4.19438 9.97217 4.38327 9.78328L3.85295 9.25295ZM3.15 13.35H2.4V13.95H3.15H3.9V13.35H3.15ZM21.15 13.95H20.4C20.4 14.8613 19.6613 15.6 18.75 15.6V16.35V17.1C20.4897 17.1 21.9 15.6897 21.9 13.95H21.15ZM18.75 16.35V15.6C17.8387 15.6 17.1 14.8613 17.1 13.95H16.35H15.6C15.6 15.6897 17.0103 17.1 18.75 17.1V16.35ZM16.35 13.95H17.1C17.1 13.0387 17.8387 12.3 18.75 12.3V11.55V10.8C17.0103 10.8 15.6 12.2103 15.6 13.95H16.35ZM18.75 11.55V12.3C19.6613 12.3 20.4 13.0387 20.4 13.95H21.15H21.9C21.9 12.2103 20.4897 10.8 18.75 10.8V11.55ZM10.35 3.15H9.6C9.6 4.06127 8.86127 4.8 7.95 4.8V5.55V6.3C9.6897 6.3 11.1 4.8897 11.1 3.15H10.35ZM7.95 5.55V4.8C7.03873 4.8 6.3 4.06127 6.3 3.15H5.55H4.8C4.8 4.8897 6.2103 6.3 7.95 6.3V5.55ZM5.55 3.15H6.3C6.3 2.23873 7.03873 1.5 7.95 1.5V0.75V0C6.2103 0 4.8 1.4103 4.8 3.15H5.55ZM7.95 0.75V1.5C8.86127 1.5 9.6 2.23873 9.6 3.15H10.35H11.1C11.1 1.4103 9.6897 0 7.95 0V0.75ZM15.15 19.35V20.1H22.35V19.35V18.6H15.15V19.35ZM22.35 19.35V20.1C23.2613 20.1 24 20.8387 24 21.75H24.75H25.5C25.5 20.0103 24.0897 18.6 22.35 18.6V19.35ZM24.75 21.75H24V22.35H24.75H25.5V21.75H24.75ZM24.75 22.35H24C24 23.2613 23.2613 24 22.35 24V24.75V25.5C24.0897 25.5 25.5 24.0897 25.5 22.35H24.75ZM22.35 24.75V24H21.15V24.75V25.5H22.35V24.75Z"
                                 fill="#1B3942" />
                           </svg>
                        </span>
                     </div>
                     <div class="tp-fa-control-item-content">
                        <h3 class="tp-fa-control-item-title">Expert guidance</h3>
                        <p>Usability refers to the measurement of how easily and efficiently a user can accomplish their
                           goals when using a product, system.</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- control area end -->


   <!-- testimonial area start -->
   <div class="tp-fi-testimonial-ptb tp-sec-ptb pt-130 pb-130" data-bg-color="#F7F7F5">
      <div class="container col-md-10 mx-auto">
         <div class="row">
            <div class="col-lg-12">
               <div class="tp-fi-testimonial-heading mb-30">
                  <span class="tp-section-sub tp-fade-anim">Trusted by industry leaders and innovators</span>
               </div>
               <div class="tp-fi-testimonial-slider-text pb-110">
                  <div class="swiper tp-testimonial-content-active">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                        <div class="swiper-slide">
                           <h3 class="tp-fi-testimonial-title">“ Their data-driven approach helped us
                              understand market movements with confidence. <br>
                              Decisions felt structured, informed, & aligned with long-term value. Complex
                              financial <br>
                              data is presented in a clear, intuitive way. The platform saves time and makes
                              <br>
                              smarter decisions easier. “
                           </h3>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row align-items-center">
            <div class="col-lg-3">
               <div class="tp-fi-testimonial-author-wrap">
                  <div class="swiper tp-testimonial-bottom-author-active">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-quote d-flex align-items-center">
                              <div class="tp-fi-testimonial-quote-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20"
                                       fill="none">
                                       <path
                                          d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                          fill="currentColor" />
                                       <path
                                          d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                          fill="currentColor" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-fi-testimonial-quote-content">
                                 <span>Serge Gojenko</span>
                                 <p>CEO & Founder</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-quote d-flex align-items-center">
                              <div class="tp-fi-testimonial-quote-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20"
                                       fill="none">
                                       <path
                                          d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                          fill="currentColor" />
                                       <path
                                          d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                          fill="currentColor" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-fi-testimonial-quote-content">
                                 <span>Jessica Brown</span>
                                 <p>Marketing Director</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-quote d-flex align-items-center">
                              <div class="tp-fi-testimonial-quote-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20"
                                       fill="none">
                                       <path
                                          d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                          fill="currentColor" />
                                       <path
                                          d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                          fill="currentColor" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-fi-testimonial-quote-content">
                                 <span>Michael Smith</span>
                                 <p>Product Manager</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-quote d-flex align-items-center">
                              <div class="tp-fi-testimonial-quote-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20"
                                       fill="none">
                                       <path
                                          d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                          fill="currentColor" />
                                       <path
                                          d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                          fill="currentColor" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-fi-testimonial-quote-content">
                                 <span>Emily Davis</span>
                                 <p>UI/UX Designer</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-quote d-flex align-items-center">
                              <div class="tp-fi-testimonial-quote-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20"
                                       fill="none">
                                       <path
                                          d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                          fill="currentColor" />
                                       <path
                                          d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                          fill="currentColor" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-fi-testimonial-quote-content">
                                 <span>David Wilson</span>
                                 <p>Software Engineer</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-quote d-flex align-items-center">
                              <div class="tp-fi-testimonial-quote-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20"
                                       fill="none">
                                       <path
                                          d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                          fill="currentColor" />
                                       <path
                                          d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                          fill="currentColor" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-fi-testimonial-quote-content">
                                 <span>Sophia Taylor</span>
                                 <p>HR Manager</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-quote d-flex align-items-center">
                              <div class="tp-fi-testimonial-quote-icon">
                                 <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="20" viewBox="0 0 28 20"
                                       fill="none">
                                       <path
                                          d="M6.47189 0C10.2296 0 12.9422 3.10229 12.9421 7.69573C12.9181 14.3697 7.90087 19.0885 0.662843 19.9946C-0.00867188 20.0787 -0.2676 19.1485 0.35078 18.8735C3.12807 17.6386 4.53074 16.0715 4.71192 14.5204C4.84728 13.3616 4.21731 12.3464 3.42628 12.1563C1.37556 11.6636 0.00155861 9.10975 0.00155861 6.47033C0.00155861 2.89687 2.89842 0 6.47189 0Z"
                                          fill="currentColor" />
                                       <path
                                          d="M20.5891 0C24.3468 0 27.0594 3.10229 27.0593 7.69573C27.0353 14.3697 22.0181 19.0885 14.78 19.9946C14.1085 20.0787 13.8496 19.1485 14.468 18.8735C17.2453 17.6386 18.6479 16.0715 18.8291 14.5204C18.9645 13.3616 18.3345 12.3464 17.5435 12.1563C15.4927 11.6636 14.1187 9.10975 14.1187 6.47033C14.1187 2.89687 17.0156 0 20.5891 0Z"
                                          fill="currentColor" />
                                    </svg>
                                 </span>
                              </div>
                              <div class="tp-fi-testimonial-quote-content">
                                 <span>Daniel Anderson</span>
                                 <p>Business Analyst</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-9">
               <div class="tp-fi-testimonial-slider-wrap">
                  <div class="swiper tp-testimonial-bottom-thumb-active">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-1.jpg" alt="">
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-2.jpg" alt="">
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-3.jpg" alt="">
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-4.jpg" alt="">
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-1.jpg" alt="">
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-2.jpg" alt="">
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-3.jpg" alt="">
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-fi-testimonial-slider-thumb">
                              <img src="assets/img/finance/testimonial/thumb-4.jpg" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tp-fi-testimonial-navigation">
                     <span class="tp-testimonial-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                           <path d="M1 9H17M17 9L9 1M17 9L9 17" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                     </span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- testimonial area end -->


   <!-- success area start -->
   {{-- <div class="tp-cn-success-ptb tp-sec-ptb pt-140 pb-110">
      <div class="container">
         <div class="row">
            <div class="col-lg-6">
               <div class="tp-cn-success-item mb-30 radius-6 p-relative"
                  data-background="assets/img/consulting/success/bg.jpg">
                  <div class="tp-cn-success-item-content pb-200">
                     <span class="tp-cn-success-item-sub tp-fade-anim">Consora success stories </span>
                     <h3 class="tp-cn-success-item-title" data-text-split data-letters-fade-in>Powering an 80% surge in
                        real-time <br>
                        transparency through a bespoke <br>
                        solution for Consora.</h3>
                     <div class="tp-fade-anim" data-delay=".5">
                        <a class="tp-btn tp-btn-switch-animation" href="sucess-story.html">
                           <span class="d-flex align-items-center justify-content-center">
                              <span class="btn-text">
                                 Read full story
                              </span>
                              <i class="btn-icon"></i>
                              <i class="btn-icon"></i>
                           </span>
                        </a>
                     </div>
                  </div>
                  <div class="tp-cn-success-item-bottom">
                     <div class="tp-cn-success-item-icon">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"
                              fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd"
                                 d="M23.2459 28.9911H34.0597C34.2531 28.9902 34.4383 28.913 34.575 28.7762C34.7118 28.6395 34.789 28.4543 34.7899 28.2609V25.1327C34.789 24.9394 34.7118 24.7541 34.575 24.6174C34.4383 24.4807 34.2531 24.4034 34.0597 24.4026H24.3884C24.3121 25.9922 23.9239 27.5513 23.2459 28.9911ZM26.1055 16.8893V23.1924H34.0597C34.574 23.1934 35.0669 23.3982 35.4305 23.7619C35.7941 24.1255 35.9989 24.6184 36 25.1327V28.2609C36.0001 28.7582 35.8085 29.2364 35.4652 29.5962C35.8085 29.956 36.0001 30.4342 36 30.9315V34.0596C35.9989 34.5739 35.7942 35.0668 35.4305 35.4305C35.0669 35.7941 34.574 35.9989 34.0598 36H13.5368C13.4129 35.9951 13.2894 35.9825 13.1671 35.9622C12.8486 35.9874 12.5267 36 12.2015 36C9.81404 36 7.47901 35.2994 5.48571 33.9852C3.49241 32.671 1.92843 30.8009 0.98752 28.6064C0.0466075 26.412 -0.229892 23.9897 0.192275 21.6397C0.614441 19.2896 1.71672 17.1151 3.36257 15.3854C5.00841 13.6557 7.1255 12.4469 9.45156 11.9088C11.7776 11.3706 14.2105 11.5267 16.4487 12.3578C18.6869 13.1888 20.6321 14.6583 22.0434 16.5842C23.4547 18.51 24.2701 20.8076 24.3884 23.1924H24.8952V16.8893L23.3444 14.2029C20.5527 13.8038 18.0619 11.6111 16.5896 9.06096C15.7342 7.57925 15.2302 6.02364 15.0639 4.55365C14.8888 3.00674 15.0865 1.54537 15.6402 0.349642L15.6411 0.350171C15.6931 0.237576 15.7786 0.143752 15.8858 0.0814892C15.9931 0.0192263 16.1169 -0.00844595 16.2404 0.00224469C17.5552 0.12054 18.9212 0.680701 20.1741 1.60641C22.6787 3.45715 24.4893 6.59515 24.8395 9.68859C25.0007 11.1124 24.8461 12.4636 24.3887 13.602L25.5005 15.5276L26.6123 13.602C26.1549 12.4636 26.0003 11.1124 26.1615 9.68867C26.5117 6.59515 28.3223 3.45708 30.827 1.60641C32.0799 0.680626 33.4458 0.12054 34.7606 0.00224469C34.8841 -0.00844595 35.0079 0.0192263 35.1152 0.0814892C35.2224 0.143752 35.3079 0.237576 35.3599 0.350171L35.3608 0.349642C35.9148 1.54537 36.1122 3.00674 35.9372 4.55365C35.587 7.64717 33.7763 10.7852 31.2716 12.6359C30.1197 13.4871 28.8721 14.0291 27.6565 14.2029L26.1055 16.8893ZM22.5173 12.7699L19.4293 7.42117C19.3899 7.35258 19.3644 7.27689 19.3542 7.19843C19.344 7.11997 19.3494 7.04027 19.3701 6.96389C19.4117 6.80963 19.5129 6.67825 19.6515 6.59863C19.79 6.51901 19.9545 6.49768 20.1087 6.53934C20.1851 6.55997 20.2566 6.59544 20.3193 6.64373C20.382 6.69202 20.4345 6.75218 20.4739 6.82077L23.5597 12.1655C23.9781 10.0925 23.39 7.72084 22.2692 5.7838C21.0185 3.6228 18.9233 1.6819 16.5705 1.26159C16.2389 2.17943 16.134 3.26595 16.2648 4.42144C16.5779 7.18746 18.2091 10.0125 20.4481 11.6669C21.0765 12.1399 21.7744 12.5117 22.5173 12.7699ZM27.4412 12.1655L30.5269 6.82077C30.6072 6.68365 30.7385 6.58382 30.8921 6.54302C31.0457 6.50222 31.2092 6.52376 31.3469 6.60295C31.4847 6.68213 31.5856 6.81255 31.6277 6.9658C31.6698 7.11905 31.6496 7.28272 31.5716 7.42117L28.4837 12.77C30.5018 12.0916 32.2418 10.4018 33.3666 8.45799C34.6175 6.29654 35.2382 3.49626 34.4307 1.26121C32.0777 1.68182 29.9824 3.62287 28.7319 5.7838C27.611 7.72077 27.0225 10.0926 27.4412 12.1655ZM15.1308 21.8135C15.1308 20.5066 14.0679 19.5151 12.8067 19.2796V18.2192C12.8067 18.0587 12.7429 17.9048 12.6294 17.7914C12.516 17.6779 12.3621 17.6141 12.2016 17.6141C12.0411 17.6141 11.8872 17.6779 11.7738 17.7914C11.6603 17.9048 11.5966 18.0587 11.5966 18.2192V19.2799C10.3354 19.515 9.27236 20.5065 9.27236 21.8138C9.27236 23.3252 10.6791 24.4029 12.2016 24.4029C13.6991 24.4029 14.4849 25.8449 13.4527 26.726C12.3812 27.6405 10.4822 27.015 10.4822 25.7814C10.4822 25.6209 10.4185 25.467 10.305 25.3535C10.1915 25.2401 10.0377 25.1763 9.87718 25.1763C9.71671 25.1763 9.56282 25.2401 9.44935 25.3535C9.33588 25.467 9.27214 25.6209 9.27214 25.7814C9.27214 27.0882 10.3352 28.0798 11.5963 28.3148V29.3756C11.5963 29.536 11.6601 29.6899 11.7736 29.8034C11.887 29.9169 12.0409 29.9806 12.2014 29.9806C12.3619 29.9806 12.5158 29.9169 12.6292 29.8034C12.7427 29.6899 12.8064 29.536 12.8064 29.3756V28.3148C14.0676 28.0798 15.1306 27.0882 15.1306 25.7814C15.1306 24.27 13.7238 23.1924 12.2014 23.1924C10.7039 23.1924 9.9181 21.7502 10.9503 20.8691C12.0219 19.9544 13.9205 20.5799 13.9205 21.8135C13.9205 21.9739 13.9842 22.1278 14.0977 22.2413C14.2112 22.3548 14.365 22.4185 14.5255 22.4185C14.686 22.4185 14.8399 22.3548 14.9533 22.2413C15.0668 22.1278 15.1308 21.9739 15.1308 21.8135ZM12.2016 14.7229C10.407 14.7229 8.65263 15.2551 7.16043 16.2522C5.66823 17.2493 4.5052 18.6666 3.81841 20.3247C3.13162 21.9829 2.95191 23.8075 3.30202 25.5678C3.65213 27.3281 4.51632 28.945 5.78532 30.2141C7.05432 31.4832 8.67113 32.3475 10.4313 32.6976C12.1914 33.0478 14.0159 32.8681 15.6739 32.1812C17.332 31.4944 18.7491 30.3313 19.7462 28.839C20.7432 27.3467 21.2754 25.5922 21.2754 23.7975C21.2754 21.3908 20.3194 19.0827 18.6177 17.3809C16.9161 15.6791 14.6081 14.723 12.2016 14.7229ZM17.7621 18.2365C16.6624 17.1366 15.2611 16.3876 13.7357 16.0841C12.2103 15.7807 10.6291 15.9364 9.19218 16.5316C7.75524 17.1269 6.52707 18.1349 5.66298 19.4282C4.79889 20.7215 4.33768 22.242 4.33768 23.7974C4.33768 25.3529 4.79889 26.8734 5.66298 28.1667C6.52707 29.46 7.75524 30.468 9.19218 31.0632C10.6291 31.6585 12.2103 31.8142 13.7357 31.5107C15.2611 31.2073 16.6624 30.4583 17.7621 29.3584C19.2368 27.8835 20.0653 25.8832 20.0653 23.7974C20.0653 21.7117 19.2368 19.7113 17.7621 18.2365ZM23.1932 23.7975C23.1932 21.6234 22.5486 19.4981 21.3408 17.6904C20.1331 15.8827 18.4164 14.4738 16.4079 13.6418C14.3995 12.8098 12.1894 12.5921 10.0573 13.0162C7.92512 13.4404 5.9666 14.4873 4.42939 16.0246C2.89218 17.5619 1.84532 19.5206 1.4212 21.6529C0.997076 23.7852 1.21474 25.9954 2.04665 28.004C2.87857 30.0126 4.28739 31.7294 6.09494 32.9373C7.90249 34.1452 10.0276 34.7899 12.2015 34.7899C13.645 34.7899 15.0743 34.5056 16.4079 33.9532C17.7415 33.4008 18.9532 32.5911 19.9739 31.5703C20.9945 30.5496 21.8042 29.3378 22.3566 28.0041C22.9089 26.6704 23.1932 25.241 23.1932 23.7975ZM17.5058 34.7898H34.0597C34.2531 34.7889 34.4383 34.7117 34.575 34.575C34.7118 34.4382 34.789 34.253 34.7899 34.0596V30.9315C34.789 30.7381 34.7118 30.5529 34.575 30.4161C34.4383 30.2794 34.2531 30.2022 34.0597 30.2013H22.5897C21.3656 32.183 19.6023 33.7748 17.5058 34.7898Z"
                                 fill="#01373D" />
                           </svg>
                        </span>
                     </div>
                     <div class="tp-cn-success-item-wrap">
                        <span>2.8x</span>
                        <p>Reduction in time spent on <br> reporting was realized</p>
                     </div>
                  </div>
                  <div class="tp-cn-success-item-shape">
                     <img src="assets/img/consulting/success/bg-shape.png" alt="">
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="tp-cn-success-item-2 mb-30" data-background="assets/img/consulting/success/thumb-1.jpg">
                  <div class="tp-cn-success-item-2-shape">
                     <img src="assets/img/consulting/success/shape.png" alt="">
                  </div>
                  <div class="tp-cn-success-item-2-content tp-fade-anim" data-delay=".5" data-fade-from="right"
                     data-bg-color="#CEF79E">
                     <span class="tp-cn-success-item-2-title">Superb consulting</span>
                     <p>This year is significant because it provides <br> insight into the history and experience </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div> --}}
   <!-- success area end -->
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
                     <div class="accordion" id="accordionExample">
                        <div class="accordion-items bg-transparent">
                           <div class="accordion-header">
                              <button class="accordion-buttons" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 How do you tailor investment strategies to individual goals?
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    Our approach is built on deep insight, independent strategy, and disciplined execution. We combine data-driven
                                    analysis with human judgment, focusing on long-term value rather than short-term market noise. Every strategy
                                    is tailored, transparent, and designed to adapt as markets evolve.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-items bg-transparent">
                           <div class="accordion-header">
                              <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                 What makes your investment approach different from others?
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    Our approach is built on deep insight, independent strategy, and disciplined execution. We combine data-driven
                                    analysis with human judgment, focusing on long-term value rather than short-term market noise. Every strategy
                                    is tailored, transparent, and designed to adapt as markets evolve.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-items bg-transparent">
                           <div class="accordion-header">
                              <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                 Is my investment strategy actively monitored and adjusted?
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    Our approach is built on deep insight, independent strategy, and disciplined execution. We combine data-driven
                                    analysis with human judgment, focusing on long-term value rather than short-term market noise. Every strategy
                                    is tailored, transparent, and designed to adapt as markets evolve.
                                 </p>
                              </div>
                           </div>
                        </div>
                        <div class="accordion-items bg-transparent">
                           <div class="accordion-header">
                              <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                 How do you balance short-term opportunities with long-term growth?
                                 <span class="tp-faq-icon"></span>
                              </button>
                           </div>
                           <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                              <div class="accordion-body">
                                 <p>
                                    Our approach is built on deep insight, independent strategy, and disciplined execution. We combine data-driven
                                    analysis with human judgment, focusing on long-term value rather than short-term market noise. Every strategy
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
                                 <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none">
                                 <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span>
                              Real time performance tracking
                           </li>
                           <li>
                              <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none">
                                 <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span>
                              Automated risk assessment
                           </li>
                           <li>
                              <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none">
                                 <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span>
                              Multi layered security login
                           </li>
                           <li>
                              <span>
                                 <svg xmlns="http://www.w3.org/2000/svg" width="10" height="8" viewBox="0 0 10 8" fill="none">
                                 <path d="M8.93182 0.75L3.30682 6.5254L0.75 3.90022" stroke="#222F30" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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


   <!-- cta area start -->
   {{-- data-background="{{ asset('assets/img/consulting/cta/cta-bg.jpg') }}" --}}
   <div class="tp-cn-cta-ptb include-bg tp-sec-ptb pt-140 pb-140">
      <div class="container col-md-10 mx-auto">
         <div class="row">
            <div class="col-lg-12">
               <div class="tp-cn-cta-content">
                  <h3 class="tp-section-title mb-20" data-text-split data-letters-fade-in>Let’s join hands and make it
                     <br> happen with the team!
                  </h3>
                  <p>Success is never a solo journey—it’s a collective effort driven by teamwork, <br> collaboration,
                     and shared vision. When we come together.</p>
                  <div class="tp-fi-partner-btn-wrap">
                     <a class="tp-btn tp-btn-switch-animation" href="contact.html">
                        <span class="d-flex align-items-center justify-content-center">
                           <span class="btn-text">
                              Sent an appointment
                           </span>
                           <i class="btn-icon"></i>
                           <i class="btn-icon"></i>
                        </span>
                     </a>
                     <div class="tp-fi-hero-contact">
                        <a href="tel:01245697">
                           <span>
                              <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                 fill="none">
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
      </div>
   </div>
   <!-- cta area end -->


</main>