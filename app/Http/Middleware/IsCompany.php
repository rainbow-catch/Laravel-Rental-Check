<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsCompany
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
        if (Auth::user() && Auth::user()->role == "Company") {
            if(Auth::user()->detail)
                return $next($request);
            else
                return redirect('/profile')->withErrors('Complete your profile first.');
        }
        abort(401);
    }
}
