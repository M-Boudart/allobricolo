<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Closure;


class AdminStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->status->status != 'Admin') {
            return redirect()->route('welcome')->with('error', 'Vous n\'êtes pas autorisé à acceder à cet url');
        }

        return $next($request);
    }
}
