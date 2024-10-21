<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role !== 'admin') { // Asumsikan ada kolom role pada tabel users
            return redirect()->route('home'); // Redirect jika bukan admin
        }
        return $next($request);
    }
}
