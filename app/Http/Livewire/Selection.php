<?php

namespace App\Http\Livewire;

use App\Http\Github;
use Livewire\Component;

class Selection extends Component
{
    public $projects;
    public $selected;
    public $username;

    public function mount()
    {
        $this->selected = [];
        $user = session("github_user") ?: unserialize(request()->cookie("github_user"));
        $github = new Github($user);
        $this->projects = $github->projects();
        $this->username = $github->nickname;
    }

    // public function select($project)
    // {
    //     if ($this->selected->contains($project)) {
    //         $this->selected = $this->selected->reject(function($item) use ($project) {
    //             return $item === $project;
    //         });
    //     } else {
    //         $this->selected[] = $project;
    //     }
    // }

    public function finalize()
    {
        cache([
            "{$this->username}_projects",
            collect($this->selected)->map(function($project_name) {
                return collect($this->projects)->where("name", $project_name);
            })
        ]);

        return redirect("/generate/about");
    }

    public function render()
    {
        return view('livewire.selection', [
            "projects" => $this->projects,
            "selected" => $this->selected
        ])
        ->extends('livewire.generate')->section('phase');
    }
}
