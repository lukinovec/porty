<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Memory;
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
        if (Memory::user() || $request->input("phase") === "auth") {
            return $next($request);
        }
        return redirect("/");
    }
}
