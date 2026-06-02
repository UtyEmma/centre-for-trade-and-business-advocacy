<div class="tp-service-philosopy-ptb tp-sec-ptb pt-135 pb-110">
      <div class="container col-md-10 mx-auto">
         <div class="row g-5">
            <div class="col-lg-5">
               <div class="tp-service-philosopy-heading top-28 sticky mb-30">
                  {{-- <span class="tp-section-sub tp-fade-anim">Consora philosophy</span> --}}
                  <h3 class="tp-section-title md:text-4xl! font-medium! mb-20" data-text-split data-letters-fade-in>
                     {{ $service->title }}
                  </h3>
                  <div class="tp-fade-anim" data-delay=".5">
                     <p class="mb-20">{{$service->summary}}</p>
                  </div>

                  <div >
                     <img class="radius-6 tp-fade-anim aspect-video w-full object-cover" data-delay=".7" src="{{ $service->image }}" alt="{{ $service->title }}" />
                  </div>
                  {{-- <div class="tp-fade-anim" data-delay=".7">
                     <x-button as="a" href="{{ route('contact') }}" >Get Started</x-button>
                  </div> --}}
               </div>
            </div>
            <div class="col-lg-7">
               <div class="tp-at-service-wrap">
                  <div class="tp-industries-service-text [&>blockquote]:border-l-4 [&>blockquote]:border-primary [&>blockquote]:italic [&>blockquote]:text-gray-400! [&>blockquote]:px-5! [&>blockquote]:py-3! text-justify [&>blockquote]:my-5 mb-40 tp-fade-anim" data-delay=".5">
                     {!! $service->description !!}
                  </div>

                  <div>
                     <x-button as="a" href="{{ route('contact') }}" variant="secondary" class="mt-5" >Get Started</x-button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>