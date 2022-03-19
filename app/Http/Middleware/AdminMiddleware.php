<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next,$guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->role == 'admin'){
                return $next($request);
            }else{
                return redirect('admin/login');
            }
        }
        return redirect('admin/login');
    }
}
