<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {

        // if (Auth::user()->rol != $role && Auth::user()->rol != 'Superadministrador') {


        //     return redirect('/home');
        // }
        return $next($request);
    }
}
