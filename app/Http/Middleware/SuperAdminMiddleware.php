<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role == 'super_admin') {
            return $next($request);
        }
        
        return redirect()->route('dashboard.index');
    }
    
}
