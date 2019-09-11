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
      if (Auth::check()) {
        $role = Auth::user()->roles->role_name;
           if ($role == 'admin') {
               return $next($request);
           }
      }
      return redirect('/'); 
    }
}
