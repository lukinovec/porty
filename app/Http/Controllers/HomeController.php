<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Github;

class HomeController extends Controller
{
    public function show(string $user = "lukinovec")
    {
        $github = new Github($user);
        return view('home', [
            "user" => $github->user(),
            "projects" => $github->projects(),
        ]);
    }
}
