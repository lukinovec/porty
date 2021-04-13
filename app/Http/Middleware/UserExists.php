<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Github;
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
        if (app(Github::class)->authenticated || $request->input("phase") === "auth") {
            return $next($request);
        }
        return redirect("/");
    }
}
