<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminAuth
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
      //jika saya tidak login maka dilempar ke halaman error
      if(!$request->user()){return redirect('/login');}
      if ($request->user()->isAdmin())
      {
        return $next ($request);
      }
        return redirect('/login');
    }
}
