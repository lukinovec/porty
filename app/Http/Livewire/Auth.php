<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class Auth extends Component
{
    public function authRedirect()
    {
        if(app(Github::class)) {
            return redirect("generate?phase=selection")->with("github_user", app(Github::class));
        }
        return Socialite::driver("github")->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver("github")->user();
        Cookie::queue(Cookie::make("github_user", serialize($user), 8));
        return redirect("generate?phase=selection")->with("github_user", $user);
    }

    public function userForget()
    {
        return app(Github::class)->forget();
    }

    public function render()
    {
        return view("livewire.auth", ["github" => app(Github::class)])
        ->extends("livewire.generate")->section("phase");
    }
}
