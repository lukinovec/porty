<?php

namespace App\Http\Controllers;

use App\Http\Github;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    public function show()
    {
        $github = new Github(session("github_user"));
        return view('home', [
            "user" => $github->user,
            "projects" => $github->projects(),
        ]);
    }
}
