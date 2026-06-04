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
                  <div class="tp-footer-widget footer-col-6-1 md:mb-[90px]! mb-10!">
                     <div class="tp-footer-logo mb-35">
                        <a href="{{ route('home') }}">
                           <img loading="lazy" data-width="130" src="{{ $siteFooterLogoUrl ?? $siteLogoUrl ?? asset('assets/img/logo/citrus-logo-white.png') }}" alt="{{ $siteSettings->site_name ?? config('app.name') }}">
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
                  <div class="tp-footer-widget md:mb-[90px]! mb-10!">
                     <h4 class="tp-footer-widget-title">QUICK LINKS</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           @foreach ($footerQuickLinks ?? [] as $link)
                              <li>
                                 <a class="tp-line-anim flex! gap-3! items-center" href="{{ $link['url'] }}">
                                    <span>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                          <path d="M0.75 4.75H8.75M8.75 4.75L2.75 0.75M8.75 4.75L2.75 8.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span>
                                    <div>
                                       {{ $link['label'] }}
                                    </div>
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6 col-sm-6">
                  <div class="tp-footer-widget md:mb-[90px]! mb-10!">
                     <h4 class="tp-footer-widget-title">Our Services</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           @foreach ($footerServices ?? [] as $service)
                              <li>
                                 <a class="tp-line-anim flex! gap-3! items-center" href="{{ route('services.show', $service) }}">
                                    <span>
                                       <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 10 10" fill="none">
                                          <path d="M0.75 4.75H8.75M8.75 4.75L2.75 0.75M8.75 4.75L2.75 8.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                       </svg>
                                    </span>
                                    <div>
                                       {{ $service->title }}
                                    </div>
                                 </a>
                              </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="tp-footer-widget md:mb-[90px]! mb-5!">
                     <h4 class="tp-footer-widget-title">Contact Us</h4>
                     <div class="tp-footer-contact-wrap">
                        @if (filled($siteSettings->address ?? null))
                           <span class="tp-footer-contact-location mb-2!">
                              <a href="{{ route('contact') }}">{{ $siteSettings->address }}</a>
                           </span>
                        @endif

                        <div>
                           @if (filled($siteSettings->phone ?? null) && filled($sitePhoneHref ?? null))
                              <a class="tp-footer-contact-tel d-inline-block mb-20 tp-line-anim" href="{{ $sitePhoneHref }}">Tel. {{ $siteSettings->phone }}</a>
                           @endif
                        </div>

                        <div>
                           @if (filled($siteSettings->email ?? null) && filled($siteEmailHref ?? null))
                              <a class="tp-footer-contact-tel d-inline-block mb-35 tp-line-anim" href="{{ $siteEmailHref }}">Mail. {{ $siteSettings->email }}</a>
                           @endif
                        </div>
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
               <div class="flex max-md:flex-col! justify-between align-items-center">
                  <div class="">
                     <div class="tp-footer-copyright-text text-center text-md-start pb-20">
                        <p class="mb-0">{{ $siteCopyrightText ?? \App\Support\Site::copyright() }}</p>
                     </div>
                  </div>
                  <div class="order-first order-md-last">
                     <div class="tp-footer-copyright-link flex flex-wrap gap-5! justify-content-center justify-content-md-end pb-20">
                        <a class="shrink-0" href="{{ route('careers') }}">Careers</a>
                        <a class="shrink-0" href="{{ route('faqs') }}">Frequently Asked Questions</a>
                        <a class="shrink-0" href="#">Privacy policy</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
