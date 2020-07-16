<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsDean
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
        if (Auth::check()){
            if (Auth::user()->user_type == 'dean') {
                return $next($request);
            } else{
                return redirect()->route('homepage');
            }
        } else{
            return redirect()->route('homepage');
        }
    }
}
