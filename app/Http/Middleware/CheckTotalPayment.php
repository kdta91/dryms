<?php

namespace App\Http\Middleware;

use Closure;

class CheckTotalPayment
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
        if (!$request->session()->exists('room_type')) {
            return redirect('/search/rooms');
        }

        return $next($request);
    }
}
