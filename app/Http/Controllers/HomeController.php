<?php

namespace App\Http\Controllers;

use App\Http\Github;

class HomeController extends Controller
{
    public function show($just_get = false)
    {
        $github = app(Github::class);
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
