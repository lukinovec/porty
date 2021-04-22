<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;

class Portfolio extends Component
{
    private $projects;
    private $user;

    public function mount(Github $github)
    {
        $this->projects = $github->selected_projects;
        $this->user = [
            'nickname' => $github->nickname,
            'about' => $github->about,
            'contact' => $github->contact
        ];
    }

    public function render()
    {
        return view('livewire.portfolio', [
            'projects' => $this->projects,
            'user' => $this->user
        ])
        ->extends('template')
        ->section('content');
    }
}
