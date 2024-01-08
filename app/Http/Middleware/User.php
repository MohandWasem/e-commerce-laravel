<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $priv_login=Auth::guard('admin')->user()->priv;
        if($priv_login==300 || $priv_login==200){
            return $next($request);

        }else{
            return redirect()->route("view/product");
        }
    }
}
