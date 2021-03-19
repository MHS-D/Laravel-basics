<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkgroup
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
            if (!$request->session()->exists('client_id')) 
                return redirect('loginP');
            
            else
            return $next($request);



    }
}
