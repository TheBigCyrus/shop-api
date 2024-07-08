<?php

namespace App\Http\Middleware;

use App\Trait\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $permission)
    {

        if (auth()->user()->role->hasPermission($permission) == False){
            return \response()->json('user is nor permission');
        }
        return $next($request);
    }
}
