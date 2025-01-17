<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::guard('web')->user()->type != 'Admin'){
                return redirect(route('admin.login'));
            }
            else{
                return $next($request);
            }
        }
        else{
            return redirect(route('admin.login'));
        }
    }
}
