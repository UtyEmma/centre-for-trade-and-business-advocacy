<?php

namespace App\Http\Middleware;

use App\Models\PublicationType;
use App\Support\Seo;
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
        $this->factory->share('publicationTypes', PublicationType::active()->get());
        $this->factory->share('seoSource', Seo::sourceForRequest($request));

        return $next($request);
    }
}
