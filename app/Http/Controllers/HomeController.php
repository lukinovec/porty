<?php

namespace App\Http\Controllers;

use App\Http\Github;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function html(Github $github)
    {
        return view('home', [
            "user" => $github->user,
            "projects" => $github->projects(),
        ])->render();
    }

    public function show()
    {
        $user = session("github_user") ?: unserialize(request()->cookie("github_user"));
        if(!$user) {
            abort(404, "Invalid user, your portfolio might have expired<br>  <a href='/auth/redirect'>click here to log in again</a>");
        }
        session(["portfolio_html" => $this->html(new Github($user))]);
        return $this->html(new Github($user));
    }
}
