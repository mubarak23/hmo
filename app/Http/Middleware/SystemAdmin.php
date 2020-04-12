<?php

namespace App\Http\Middleware;

use Closure;

class SystemAdmin
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
        //return $next($request);
        
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 2) {
            return redirect()->route('doctor');
        }

        if (Auth::user()->role == 3) {
            return redirect()->route('nurse');
        }

        if (Auth::user()->role == 4) {
            return redirect()->route('pharmacist');
        }

        if (Auth::user()->role == 5) {
            return redirect()->route('labaratory');
        }

        if (Auth::user()->role == 6) {
            return redirect()->route('receptionist');
        }

        if (Auth::user()->role == 7) {
            return redirect()->route('patient');
        }

        if (Auth::user()->role == 1) {
            return $next($request);
        }

    }
    
}
