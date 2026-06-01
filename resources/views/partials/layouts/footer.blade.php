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
            <div class="row align-items-center">
               <div class="col-lg-6">
                  <div class="tp-footer-2-newsletter">
                     <div class="tp-footer-2-newsletter-icon">
                        <span>
                           <svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24" fill="none">
                           <path d="M10.5473 24C11.9859 24 13.2248 23.131 13.7685 21.8906H7.32605C7.86966 23.131 9.10861 24 10.5473 24Z" fill="#01373D"/>
                           <path d="M17.8126 11.6185V10.0781C17.8126 6.80522 15.637 4.0312 12.6563 3.12516V2.10938C12.6563 0.946266 11.71 0 10.5469 0C9.38382 0 8.43755 0.946266 8.43755 2.10938V3.12516C5.45677 4.0312 3.2813 6.80517 3.2813 10.0781V11.6185C3.2813 14.4935 2.18546 17.2195 0.195664 19.2946C0.00066416 19.4979 -0.0541328 19.798 0.0563985 20.0571C0.16693 20.3162 0.421461 20.4844 0.70318 20.4844H20.3907C20.6724 20.4844 20.9269 20.3162 21.0374 20.0571C21.1479 19.798 21.0931 19.4979 20.8982 19.2946C18.9084 17.2195 17.8126 14.4934 17.8126 11.6185ZM11.2501 2.84663C11.0186 2.82431 10.7841 2.8125 10.5469 2.8125C10.3097 2.8125 10.0752 2.82431 9.8438 2.84663V2.10938C9.8438 1.72167 10.1592 1.40625 10.5469 1.40625C10.9346 1.40625 11.2501 1.72167 11.2501 2.10938V2.84663Z" fill="#01373D"/>
                           </svg>
                        </span>
                     </div>
                     <div class="tp-footer-2-newsletter-content">
                        <span>Stay informed on policy, markets, and reform.</span>
                        <p>Subscribe to receive updates on our research, publications, events, position papers, and policy developments across trade, competition, and regulatory governance.</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="d-flex justify-content-lg-end">
                     <div class="tp-footer-2-newsletter-input">
                        <input type="text" placeholder="Your email address">
                        <button>
                           <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                              <path d="M0.75 6.75H12.75M12.75 6.75L6.75 0.75M12.75 6.75L6.75 12.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                           </svg>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
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
                     <h4 class="tp-footer-widget-title">INDUSTRIES</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           <li><a class="tp-line-anim" href="#">Advanced manufacturing</a></li>
                           <li><a class="tp-line-anim" href="#">Telecommunication</a></li>
                           <li><a class="tp-line-anim" href="#">Investment management</a></li>
                           <li><a class="tp-line-anim" href="#">Health and life insurance</a></li>
                           <li><a class="tp-line-anim" href="#">Telecommunications</a></li>
                           <li><a class="tp-line-anim" href="#">Automotive & mobility</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-6 col-sm-6">
                  <div class="tp-footer-widget mb-90">
                     <h4 class="tp-footer-widget-title">SERVICES</h4>
                     <div class="tp-footer-widget-menu">
                        <ul>
                           <li><a class="tp-line-anim" href="#">Risk & financial advisory</a></li>
                           <li><a class="tp-line-anim" href="#">Audit and assurance</a></li>
                           <li><a class="tp-line-anim" href="#">Online business consulting</a></li>
                           <li><a class="tp-line-anim" href="#">Finance consulting</a></li>
                           <li><a class="tp-line-anim" href="#">HR Management</a></li>
                           <li><a class="tp-line-anim" href="#">Tax advisory</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-xl-3 col-md-4 col-sm-6">
                  <div class="tp-footer-widget mb-60">
                     <h4 class="tp-footer-widget-title">LOCATION</h4>
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
                        <img src="{{ asset('assets/img/finance/cta/footer-map-2.png') }}" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="tp-footer-copyright-area">
         <div class="container col-md-10 mx-auto">
            <div class="tp-footer-copyright-border pt-30 pb-10">
               <div class="row align-items-center">
                  <div class="col-xl-4 col-lg-5 col-md-6">
                     <div class="tp-footer-copyright-text text-center text-md-start pb-20">
                        <p class="mb-0">{{ $siteCopyrightText ?? \App\Support\Site::copyright() }}</p>
                     </div>
                  </div>
                  <div class="col-xl-8 col-lg-7 col-md-6">
                     <div class="tp-footer-copyright-link d-flex justify-content-center justify-content-md-end pb-20">
                        <a href="#">Teams and conditions</a>
                        <a href="#">Privacy policy</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
