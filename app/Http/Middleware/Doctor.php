<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Doctor
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

        if (Auth::user()->user_roles_id == 1) {
            return redirect()->route('systemadmin');
        }

        if (Auth::user()->user_roles_id == 3) {
            return redirect()->route('nurse');
        }

        if (Auth::user()->user_roles_id == 4) {
            return redirect()->route('pharmacist');
        }

        if (Auth::user()->user_roles_id == 5) {
            return redirect()->route('labaratory');
        }

        if (Auth::user()->user_roles_id == 6) {
            return redirect()->route('receptionist');
        }

        if (Auth::user()->user_roles_id == 7) {
            return redirect()->route('patient');
        }

        if (Auth::user()->user_roles_id == 2) {
            return $next($request);
        }
    }
}
