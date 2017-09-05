<?php

namespace App\Http\Middleware;

use Closure;

class RoleAuthentication
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
        if (auth()->guest()||(auth()->user()->role)=="Librarian"){
            return $next($request);
        }
        return redirect('/home');
    }
}
