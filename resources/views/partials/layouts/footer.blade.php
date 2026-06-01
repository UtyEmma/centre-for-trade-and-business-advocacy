<x-sections::ctas.banner  />

{{-- <div class="tp-fa-cta-ptb">
   <div class="tp-fa-cta-thumb">
      <img src="{{ asset('assets/img/advisory/cta/thumb.jpg') }}" alt="">
   </div>
</div> --}}

<footer>
   <div class="tp-footer-2-area tp-footer-2-style fix z-index-1 pt-100" data-bg-color="#01373D">
      <div class="tp-footer-2-shape">
         <svg xmlns="http://www.w3.org/2000/svg" width="757" height="338" viewBox="0 0 757 338" fill="none">
         <path d="M395.488 0.237305C394.527 60.8943 338.782 194.532 123.488 243.828C-145.628 305.448 137.905 31.0472 410.866 76.2993C427.526 78.2249 453.732 93.6299 425.283 139.845C389.721 197.613 8.15188 522.08 547.346 265.973C978.702 61.0869 589.956 314.113 341.664 466.237" stroke="white" stroke-opacity="0.02" stroke-width="30"/>
         </svg>
      </div>
      <div class="tp-footer-2-top">
         <div class="container col-md-10 mx-auto">
            <livewire:subscriptions.form />
         </div>
      </div>
      <div class="container col-md-10 mx-auto">
         <div class="tp-footer-widget-wrap">
            <div class="row">
               <div class="col-xl-3 col-md-6 col-sm-6">
                  <div class="tp-footer-widget footer-col-6-1 mb-90">
                     <div class="tp-footer-logo mb-35">
                        <a href="{{ route('home') }}">
                           <img data-width="130" src="{{ $siteFooterLogoUrl ?? $siteLogoUrl ?? asset('assets/img/logo/citrus-logo-white.png') }}" alt="{{ $siteSettings->site_name ?? config('app.name') }}">
                        </a>
                     </div>
                     @if (filled($siteSettings->footer_text ?? null))
                        <div class="tp-footer-text mb-30">
                           <p>{{ $siteSettings->footer_text }}</p>
                        </div>
                     @endif
                     @if (! empty($siteSocialProfiles ?? []))
                        <div class="tp-footer-widget-social">
                           @foreach ($siteSocialProfiles as $profile)
                              <a href="{{ $profile['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $profile['label'] }}">
                                 @svg($profile['icon'], 'size-5')
                              </a>
                           @endforeach
                        </div>
                     @endif
                  </div>
               </div>
               <div class="col-xl-3 col-md-6 col-sm-6">
                  <div class="tp-footer-widget mb-90">
                     <h4 class="tp-footer-widget-title">QUICK LINKS</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           @foreach ($footerQuickLinks ?? [] as $link)
                              <li><a class="tp-line-anim" href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6 col-sm-6">
                  <div class="tp-footer-widget mb-90">
                     <h4 class="tp-footer-widget-title">Our Services</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           @foreach ($footerServices ?? [] as $service)
                              <li><a class="tp-line-anim" href="{{ route('services.show', $service) }}">{{ $service->title }}</a></li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="tp-footer-widget mb-60">
                     <h4 class="tp-footer-widget-title">Contact Us</h4>
                     <div class="tp-footer-contact-wrap">
                        @if (filled($siteSettings->address ?? null))
                           <span class="tp-footer-contact-location">
                              <a href="{{ route('contact') }}">{{ $siteSettings->address }}</a>
                           </span>
                        @endif
                        <h4 class="tp-footer-widget-title">Contact Us</h4>
                        @if (filled($siteSettings->phone ?? null) && filled($sitePhoneHref ?? null))
                           <a class="tp-footer-contact-tel d-inline-block mb-20 tp-line-anim" href="{{ $sitePhoneHref }}">Tel. {{ $siteSettings->phone }}</a>
                        @endif
                        @if (filled($siteSettings->email ?? null) && filled($siteEmailHref ?? null))
                           <a class="tp-footer-contact-tel d-inline-block mb-35 tp-line-anim" href="{{ $siteEmailHref }}">{{ $siteSettings->email }}</a>
                        @endif
                        {{-- <img src="{{ asset('assets/img/finance/cta/footer-map-2.png') }}" alt=""> --}}
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      <div class="tp-footer-copyright-area">
         <div class="container col-md-10 mx-auto">
            <div class="tp-footer-copyright-border pt-30 pb-10">
               <div class="flex justify-between align-items-center">
                  <div class="">
                     <div class="tp-footer-copyright-text text-center text-md-start pb-20">
                        <p class="mb-0">{{ $siteCopyrightText ?? \App\Support\Site::copyright() }}</p>
                     </div>
                  </div>
                  <div class="">
                     <div class="tp-footer-copyright-link flex gap-5! justify-content-center justify-content-md-end pb-20">
                        <a href="{{ route('careers') }}">Careers</a>
                        <a href="{{ route('faqs') }}">Frequently Asked Questions</a>
                        <a href="#">Privacy policy</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
