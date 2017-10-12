<?php

namespace App\Http\Middleware;

use Closure;

class Dashboard
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
         if (!$request->session()->exists('userid')){
             
            if ($request->ajax()) {
                //return response('Unauthorized.', 401);
                  return redirect('login');
            } else {
                return redirect()->back();
            }
        } 
        return $next($request);
    }
}
