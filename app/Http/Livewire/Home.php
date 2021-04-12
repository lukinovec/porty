<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;
class Home extends Component
{
    public $projects;

    public function mount()
    {
        $this->projects = $this->getUser()->projects();
    }

    public function getUser()
    {
        return app(Github::class) ?: abort(404, "Your portfolio might have expired<br>  <a href='/auth/redirect'>click here to log in again</a>");
    }

    public function clear()
    {
        return $this->getUser()->forget();
    }

    public function refreshProjects()
    {
        $this->projects = $this->getUser()->projects(true);
    }

    public function render()
    {
        return view('livewire.home', [
            "user" => $this->getUser()->user_details,
            "projects" => $this->projects,
        ])
        ->extends('template')
        ->section('content');
    }
}
