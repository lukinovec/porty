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
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $socialite_user = Socialite::driver('github')->user();
        Cookie::queue(Cookie::make('socialite_user', serialize($socialite_user), 8));
        return redirect('generate?phase=selection');
    }

    public function userForget()
    {
        return app('logout');
    }

    public function render()
    {
        return view('livewire.auth', ['github' => app(Github::class)])
        ->extends('livewire.generate')->section('phase');
    }
}
