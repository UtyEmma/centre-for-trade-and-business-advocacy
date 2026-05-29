<?php

namespace App\Http\Middleware;

use App\Models\PublicationType;
use Closure;
use Illuminate\Http\Request;
use Illuminate\View\Factory;
use Symfony\Component\HttpFoundation\Response;

class ShareViewData
{

    function __construct(protected Factory $factory)
    {

    }
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response {
        $this->factory->share('publicationTypes', PublicationType::active()->get());
        return $next($request);
    }
}
