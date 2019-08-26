<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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
        if (Auth::guest()) {
            return redirect(route('login'));
        }

        if (Auth::user()->usertype_id !== 2) {
            return redirect('/admin/home');
        }

        return $next($request);
    }
}
