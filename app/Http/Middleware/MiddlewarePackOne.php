<?php

namespace App\Http\Middleware;

use Closure;

class MiddlewarePackOne
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
        echo "Middleware Pack One Handler";
        return $next($request);
    }
}
