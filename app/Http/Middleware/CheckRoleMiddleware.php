<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // CheckRoleMiddleware.php
    
    public function handle($request, Closure $next, $role)
    {
        // Pastikan pengguna telah login
        if (!Auth::check()) {
            return redirect('/login');
        }
        
        // Periksa peran pengguna
        $userRole = Auth::user()->role_id;
  

        if ($userRole != $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
