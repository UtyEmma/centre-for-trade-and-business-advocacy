<?php
namespace App\Support;

use App\Http\Middleware\RegisterPages;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

class Pages {


    static function list(){
        return collect(Route::getRoutes())
            ->filter(function(RoutingRoute $route, $name){
                return in_array(RegisterPages::class, $route->gatherMiddleware()) && isset($route->defaults['title']);
            })
            ->mapWithKeys(function(RoutingRoute $route){
                return  [$route->getName() => $route->defaults['title'] ?? $route->getName()];
            });
    }

}