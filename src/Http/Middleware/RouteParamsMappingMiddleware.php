<?php

namespace BeautyCoding\ApiUtils\Http\Middleware;

use Closure;
use Route;

class RouteParamsMappingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $routeParameters = [];
        $route           = Route::getRoutes()->match($request);

        foreach (config('routeparamsmapping') as $key => $value) {
            if ($route->$key) {
                $routeParameters[$value] = $route->$key;
            }
        }

        $request->merge(array_merge($request->all(), $routeParameters));

        return $next($request);
    }
}
