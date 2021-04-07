<?php

namespace App\Http\Controllers;

use App\Http\Github;

class HomeController extends Controller
{
    public function show($just_get = false)
    {
        $user = session("github_user") ?: unserialize(request()->cookie("github_user"));
        if(!$user) {
            abort(404, "Invalid user, your portfolio might have expired<br>  <a href='/auth/redirect'>click here to log in again</a>");
        }
        $github = new Github($user);
        return view('home', [
            "user" => $github->user,
            "projects" => $github->projects($just_get),
        ])->render();
    }

    public function refresh()
    {
        return redirect("/portfolio")->with("just_get", true);
    }
}
