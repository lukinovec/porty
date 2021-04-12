<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
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

    public function forget()
    {
        return app('logout');
    }

    public function render()
    {
        return view('livewire.welcome', [
            "user" => app(Github::class)
        ])->extends('template')
        ->section('content');
    }
}
