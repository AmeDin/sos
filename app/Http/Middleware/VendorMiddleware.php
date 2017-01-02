<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class VendorMiddleware
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
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'svendor')
        {
            \Log::info('role', ['role'=> Sentinel::getUser()->roles()->first()]);
            return $next($request);
        }else
        {
            return redirect('/');
        }
    }
}
