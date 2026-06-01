<?php

namespace App\Http\Middleware;

use App\Models\Faq;
use App\Models\PublicationType;
use App\Support\Seo;
use App\Support\Site;
use Closure;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Symfony\Component\HttpFoundation\Response;

class ShareViewData
{
    public function __construct(protected Factory $factory) {}

    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $siteSettings = Site::settings();

        $this->factory->share('publicationTypes', PublicationType::active()->get());
        $this->factory->share('seoSource', Seo::sourceForRequest($request));
        $this->factory->share('pageFaqs', Faq::page()->get());
        $this->factory->share('siteSettings', $siteSettings);
        $this->factory->share('siteLogoUrl', Site::assetUrl($siteSettings->site_logo, '/assets/img/logo/logo.png'));
        $this->factory->share('siteFooterLogoUrl', Site::assetUrl($siteSettings->footer_logo, $siteSettings->site_logo));
        $this->factory->share('siteFaviconUrl', Site::assetUrl($siteSettings->favicon, '/assets/img/logo/favicon.png'));
        $this->factory->share('siteSocialProfiles', Site::socialProfiles($siteSettings));
        $this->factory->share('siteCopyrightText', Site::copyright($siteSettings));
        $this->factory->share('siteEmailHref', Site::emailHref($siteSettings));
        $this->factory->share('sitePhoneHref', Site::phoneHref($siteSettings));
        $this->factory->share('siteHeaderScripts', $siteSettings->header_scripts);
        $this->factory->share('siteFooterScripts', $siteSettings->footer_scripts);

        return $next($request);
    }
}
