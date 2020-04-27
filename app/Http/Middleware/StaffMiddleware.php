<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::User()->admin === 1) {
            return $next($request);
        }
        else if (Auth::User()->profesi == "Staff") {
            return $next($request);
        }
        else {
        abort(403, 'Anda Tidak berhak Mengakses Halaman Ini.');
        }
        
        
    }
}
