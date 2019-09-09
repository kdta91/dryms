<?php

namespace App\Http\Middleware;

use Closure;

class CheckDate
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
        if (!($request->session()->exists('date_in') && $request->session()->exists('date_out'))) {
            return redirect('/');
        }

        return $next($request);
    }
}
