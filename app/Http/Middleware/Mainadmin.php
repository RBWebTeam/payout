<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class Mainadmin
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

        if (Session::get('role_id')==1) {
            //return redirect('login');
            return $next($request);
        }else{
            return redirect('/');
        }

        return $next($request);
    }
}
