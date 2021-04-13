<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class Auth extends Component
{
    private $github;
    public function mount(Github $github)
    {
        $this->github = $github;
    }

    public function authRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $socialite_user = Socialite::driver('github')->user();
        Cookie::queue(Cookie::make('socialite_user', serialize($socialite_user), 20));
        return redirect('generate?phase=selection');
    }

    public function userForget()
    {
        return app('logout');
    }

    public function render()
    {
        return view('livewire.auth', ['github' => $this->github])
        ->extends('livewire.generate')->section('phase');
    }
}
