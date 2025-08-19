<?php

namespace App\Http\Middleware;   // <-- ye line zaroori hai

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('user')) {
            // Agar user login nahi hai to login page pe bhejo
            return redirect()->route('login.page');
        }

        return $next($request);
    }
}
