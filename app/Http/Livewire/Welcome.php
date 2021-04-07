<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public function generate($user_exists = false)
    {
        if ($user_exists) {
            return redirect("/portfolio");
        }
        return redirect("auth/redirect");
    }

    public function render()
    {
        return view('livewire.welcome', [
            "user" => unserialize(request()->cookie("github_user"))
        ])->extends('template')
        ->section('content');
    }
}
