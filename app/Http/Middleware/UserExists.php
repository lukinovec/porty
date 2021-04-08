<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->cookie("github_user") || cache("github_user")) {
            return $next($request);
        }
        return redirect("/");
    }
}
