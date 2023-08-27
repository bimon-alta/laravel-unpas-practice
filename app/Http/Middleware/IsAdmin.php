<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     * MIDDLEWARE TAMBAHAN dipakai untuk otorisasi user pada AdminCategoryController
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
      if( !auth()->check() || !auth()->user()->is_admin){
        abort(403);
      }

      return $next($request);
    }
}


// Agar middleware buatan kita bisa dipakai, harus di di-regist-kan di file Kernel /app/Http/Kernel.php
