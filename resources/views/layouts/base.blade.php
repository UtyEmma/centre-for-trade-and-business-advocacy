<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   {!! seo($seoSource ?? \App\Support\Site::fallbackSEOData()) !!}
   @if (filled($siteFaviconUrl ?? null))
      <link rel="icon" href="{{ $siteFaviconUrl }}">
   @endif

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}"> 
   <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/spacing.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

   {!! CookieConsent::styles() !!}
   @vite(['resources/css/app.css'])
   {!! $siteHeaderScripts ?? '' !!}
</head>

<body class="theme-finance">

    <div id="loading">
      <div class="loader-mask">
         <li class="tp-fading-circle">
            <div class="tp-circle1 tp-circle"></div>
            <div class="tp-circle2 tp-circle"></div>
            <div class="tp-circle3 tp-circle"></div>
            <div class="tp-circle4 tp-circle"></div>
            <div class="tp-circle5 tp-circle"></div>
            <div class="tp-circle6 tp-circle"></div>
            <div class="tp-circle7 tp-circle"></div>
            <div class="tp-circle8 tp-circle"></div>
            <div class="tp-circle9 tp-circle"></div>
            <div class="tp-circle10 tp-circle"></div>
            <div class="tp-circle11 tp-circle"></div>
            <div class="tp-circle12 tp-circle"></div>
         </li>
         {{-- <h3 class="loading-title">{{ env('APP_NAME') }}</h3> --}}
      </div>
    </div>
   <!-- Loader End -->


   <!-- back to top start -->
   <div class="back-to-top-wrapper">
      <button id="back_to_top" type="button" class="back-to-top-btn">
         <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
               stroke-linejoin="round" />
         </svg>
      </button>
   </div>
   <!-- back to top end -->


   <!-- tp-offcanvus-area-start -->
   <div class="tp-offcanvas-area">
      <div class="tp-offcanvas-wrapper">
         <div class="tp-offcanvas-top d-flex align-items-center justify-content-between">
            <div class="tp-offcanvas-logo">
               <a href="{{ route('home') }}">
                  <img class="logo-1" data-width="120" src="{{ $siteLogoUrl ?? asset('assets/img/logo/logo.png') }}" alt="{{ $siteSettings->site_name ?? config('app.name') }}">
               </a>
            </div>
            <div class="tp-offcanvas-close">
               <button class="tp-offcanvas-close-btn">
                  <svg width="37" height="38" viewBox="0 0 37 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M9.19141 9.80762L27.5762 28.1924" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                     <path d="M9.19141 28.1924L27.5762 9.80761" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
               </button>
            </div>
         </div>
         <div class="tp-offcanvas-main">
            <div class="tp-offcanvas-content d-none d-xl-block">
               <h3 class="tp-offcanvas-title text-2xl!">{{ $siteSettings->site_name ?? config('app.name') }}</h3>
               @if (filled($siteSettings->tagline ?? null))
                  <p>{{ $siteSettings->tagline }}</p>
               @endif
            </div>
            <div class="tp-offcanvas-menu d-xl-none">
               <nav></nav>
            </div>
            {{-- <div class="tp-offcanvas-gallery d-none d-xl-block">
               <div class="row gx-2">
                  <div class="col-md-4 col-3">
                     <div class="tp-offcanvas-gallery-img fix">
                        <a class="popup-image" href="assets/img/blog/recent-thumb-1.jpg">
                           <img src="assets/img/blog/recent-thumb-1.jpg" alt="">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-4 col-3">
                     <div class="tp-offcanvas-gallery-img fix">
                        <a class="popup-image" href="assets/img/blog/recent-thumb-2.jpg">
                           <img src="assets/img/blog/recent-thumb-2.jpg" alt="">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-4 col-3">
                     <div class="tp-offcanvas-gallery-img fix">
                        <a class="popup-image" href="assets/img/blog/recent-thumb-3.jpg">
                           <img src="assets/img/blog/recent-thumb-3.jpg" alt="">
                        </a>
                     </div>
                  </div>
               </div>
            </div> --}}
            <div class="tp-offcanvas-contact">
               <h3 class="tp-offcanvas-title sm">Information</h3>
               <ul>
                  @if (filled($siteSettings->phone ?? null) && filled($sitePhoneHref ?? null))
                     <li><a href="{{ $sitePhoneHref }}">{{ $siteSettings->phone }}</a></li>
                  @endif
                  @if (filled($siteSettings->email ?? null) && filled($siteEmailHref ?? null))
                     <li><a href="{{ $siteEmailHref }}">{{ $siteSettings->email }}</a></li>
                  @endif
                  @if (filled($siteSettings->address ?? null))
                     <li><a href="{{ route('contact') }}">{{ $siteSettings->address }}</a></li>
                  @endif
               </ul>
            </div>
            @if (! empty($siteSocialProfiles ?? []))
               <div class="tp-offcanvas-social">
                  <h3 class="tp-offcanvas-title sm">Follow Us</h3>
                  <ul>
                     @foreach ($siteSocialProfiles as $profile)
                        <li>
                           <a href="{{ $profile['url'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $profile['label'] }}">
                              @svg($profile['icon'], 'size-5')
                           </a>
                        </li>
                     @endforeach
                  </ul>
               </div>
            @endif
         </div>
      </div>
   </div>
   <div class="body-overlay"></div>

    {{ $slot }}

    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.js') }}"></script>
    <script src="{{ asset('assets/js/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/nice-select.js') }}"></script>
    <script src="{{ asset('assets/js/purecounter.js') }}"></script>
    <script src="{{ asset('assets/js/plugin.js') }}"></script>
    <script src="{{ asset('assets/js/slider-active.js') }}"></script>
    <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    {!! CookieConsent::scripts() !!}
    {!! $siteFooterScripts ?? '' !!}
</body>
</html>
