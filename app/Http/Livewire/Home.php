<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;

class Home extends Component
{
    public $projects;
    private $user;

    public function mount()
    {
        $this->user = $this->getUser();
        $this->projects = $this->user->selected_projects;
    }

    public function getUser()
    {
        return app(Github::class) ?: abort(404, "Your portfolio might have expired<br>  <a href='/auth/redirect'>click here to log in again</a>");
    }

    public function clear()
    {
        return app('logout');
    }

    public function render()
    {
        $user = $this->getUser();

        return view(
            'livewire.home',
            [
                'user' => $user->user_details,
                'bio' => $user->about,
                'contact' => $user->contact,
                'projects' => $this->projects,
            ]
        )
        ->extends('template')
        ->section('content');
    }
}
