<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        if ($request->user()->isDeveloper()) {
            return $next($request);
        }
        
        if (!$request->user()->hasPermission($permission)) {
            return abort(404);
        }

        return $next($request);
    }
}
