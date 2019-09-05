<?php

namespace App\Http\Middleware;

use Closure;

class BookingRoutesCheck
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
        if (!$request->session()->exists('date_in')) {
            return redirect('/');
        }

        return $next($request);
    }
}
