<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Session\Middleware\StartSession;

class check
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
       // echo "<h1> this from my first middleware </h1>";

       if($request->id && $request->id>100){
            return redirect('noaccess');
       }
        return $next($request); 
    }
 /*    public function handle($request, Closure $next)
    {
        
        if ($request->session()->exists('client')) {
            // user value cannot be found in session
            return redirect('loginP');
        }

        return $next($request);
    } */
}
