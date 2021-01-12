<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkroute
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
        if($request->num && $request->num<20){
            return redirect('noaccess');
       }
        return $next($request);
    }
}
