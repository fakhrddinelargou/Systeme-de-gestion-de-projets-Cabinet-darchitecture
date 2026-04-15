<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\returnArgument;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next ,  ...$role): Response
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        
        if(auth()->check() && in_array(auth()->user()->role->name , $role)){
            return $next($request);
        }
        return back()->with('error', "Sorry , you don't have access :(");
    }
}
