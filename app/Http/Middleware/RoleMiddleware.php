<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next,): Response
    {
    
    $user_level = Auth::user()->user_level;

    if($user_level != 'admin') {
        return abort(403);
    }
    return $next($request);
}
}