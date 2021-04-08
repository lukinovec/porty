<?php

namespace App\Http\Livewire;

use App\Http\Github;
use Livewire\Component;
use Illuminate\Support\Facades\Cookie;

class Home extends Component
{
    public $projects;

    public function mount()
    {
        $this->projects = $this->getUser()->projects();
    }

    public function getUser($just_get = false)
    {
        $user = session("github_user") ?: unserialize(request()->cookie("github_user"));
        if(!$user) {
            abort(404, "Your portfolio might have expired<br>  <a href='/auth/redirect'>click here to log in again</a>");
        }
        return new Github($user, $just_get);
    }

    public function clear()
    {
        Cookie::queue(Cookie::forget("github_user"));
        return redirect("/");
    }

    public function refreshProjects()
    {
        $this->projects = $this->getUser(true)->getProjects();
    }

    public function render()
    {
        return view('livewire.home', [
            "user" => $this->getUser()->user,
            "projects" => $this->projects,
        ])
        ->extends('template')
        ->section('content');
    }
}
