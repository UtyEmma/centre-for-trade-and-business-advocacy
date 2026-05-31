<main>

    <x-partials::page.header 
        title="Case Studies"
        description="Explore our case studies to see how we've helped clients achieve remarkable results across various industries. From driving a 45% increase in sales for a retail partner to accelerating decarbonization in the farming supply chain, our case studies showcase our expertise and impact."
        image="{{ asset('assets/images/banners/case-study-page-banner.png') }}"
    />

    
    <!-- case studies area start -->
    <div class="tp-case-studies-ptb tp-sec-ptb pt-135 pb-110">
       <div class="container col-md-10 mx-auto">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="tp-fi-service-heading text-center mb-60">
                        <span class="tp-section-sub tp-fade-anim">What we provide</span>
                        <h3 class="tp-section-title" data-text-split data-letters-fade-in>Powering the complete landscape <br> of
                           global financial services</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                    @forelse ($this->caseStudies as $caseStudy)
                        <div class="col-lg-6">
                            <x-case-studies.item :caseStudy="$caseStudy" />
                        </div>
                    @empty
                        <p>No case studies available at the moment. Please check back later.</p>
                    @endforelse
               </div>
            </div>
         </div>
         <!-- case studies area end -->


         <!-- cta area start -->
         <div class="tp-fi-cta-ptb pb-140">
            <div class="container col-md-10 mx-auto">
               <div class="tp-fi-cta-bg radius-6 include-bg" data-bg-color="#CEF79E" data-background="assets/img/finance/cta/cta-bg.png">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <div class="tp-fi-cta-wrapper">
                           <h3 class="tp-fi-cta-title" data-text-split data-letters-fade-in>Fresh perspectives, news <br> & Financial resources</h3>
                           <div class="tp-fi-cta-input d-flex">
                              <input type="text" placeholder="Your email address">
                              <button class="tp-btn-event">
                                 <i class="button-text">Subscribe</i>
                                 <i class="button-icon-wrapper">
                                    <img src="assets/img/finance/hero/btn-arrow.svg" loading="lazy" width="16"
                                       height="16" alt="" class="button-image">
                                    <i class="button-dot"></i>
                                 </i>
                              </button>
                           </div>
                           <p>Over $100 million in contracts closed</p>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="tp-fi-cta-thumb p-relative text-lg-end">
                           <img class="radius-6" src="assets/img/finance/cta/cta-thumb.jpg" alt="">
                           <div class="tp-fi-cta-thumb-shape">
                              <img src="assets/img/finance/cta/shape.svg" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- cta area end -->
         

      </main>