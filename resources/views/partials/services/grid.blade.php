<div class="tp-fi-service-ptb tp-sec-ptb pt-130 pb-110">
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
      <div class="grid md:grid-cols-3 gap-4">
         @foreach ($services as $service)
            <x-services.item :service="$service" />
         @endforeach

         <div class="tp-fi-service-item-2 mb-30 flex flex-col h-100" data-background="assets/img/finance/about/service-1.jpg">
            <div class="tp-fi-service-item-2-content">
               <div class="tp-fi-service-item-2-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="46" height="43" viewBox="0 0 46 43" fill="none">
                     <path
                        d="M44.036 15.3834V7.81584L24.5766 1.05908L3.76575 8.35638V21.0591L24.5766 27.8158L44.036 21.0591V33.4915L24.5766 41.0591L3.76575 33.4915L13.7657 31.5996"
                        stroke="#CEF79E" stroke-width="2" />
                     <path d="M24.7655 40.8091V12.0591" stroke="#CEF79E" stroke-width="2" />
                     <path
                        d="M24.7654 6.05908C26.4222 6.05908 27.7654 7.40223 27.7654 9.05908C27.7654 10.7159 26.4222 12.0591 24.7654 12.0591C23.1085 12.0591 21.7654 10.7159 21.7654 9.05908C21.7654 7.40223 23.1085 6.05908 24.7654 6.05908Z"
                        stroke="#CEF79E" stroke-width="2" />
                  </svg>
               </div>
               <h3 class="tp-fi-service-item-2-title">Over 1,000 monthly <br>
                  transfer managed <br>
                  seamlessly</h3>
            </div>
         </div>
      </div>
   </div>
</div>