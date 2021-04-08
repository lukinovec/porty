<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class Auth extends Component
{
    public function authRedirect()
    {
        if(request()->cookie("github_user")) {
            return redirect("generate/selection")->with("github_user", unserialize(request()->cookie("github_user")));
        }
        return Socialite::driver("github")->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver("github")->user();
        Cookie::queue(Cookie::make("github_user", serialize($user), 10));
        return redirect("generate/selection")->with("github_user", $user);
    }

    public function render()
    {
        return view("livewire.auth")
        ->extends("livewire.generate")->section("phase");
    }
}
