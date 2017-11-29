<?php

namespace App\Http\Middleware;

use Closure;

class UserSecurity
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
       
         if ($request == \Auth::user()->id) {
            return $next($request);
        }

        return redirect()->to('/');
    }
}
