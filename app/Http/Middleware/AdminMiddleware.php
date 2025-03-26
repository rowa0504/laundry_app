<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): \Symfony\Component\HttpFoundation\Response
    {
        if(Auth::check() && Auth::user()->role_id == User::ADMIN_ROLE_ID)
        {
            return $next($request);
        }
        return redirect()->route('login'); //login
    }
}
