<?php

namespace App\Http\Livewire;

use App\Helpers\Memory;
use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;

class Auth extends Component
{
    public function authRedirect()
    {
        if(Memory::user()) {
            return redirect("generate?phase=selection")->with("github_user", Memory::user());
        }
        return Socialite::driver("github")->redirect();
    }

    public function callback()
    {
        $user = Socialite::driver("github")->user();
        Memory::setUser($user);
        return redirect("generate?phase=selection")->with("github_user", $user);
    }

    public function userForget()
    {
        return Memory::userForget();
    }

    public function render()
    {
        return view("livewire.auth", ["memory" => \App\Helpers\Memory::class])
        ->extends("livewire.generate")->section("phase");
    }
}
