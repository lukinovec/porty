<?php

namespace App\Http\Livewire;

use ErrorException;
use App\Http\Github;
use App\Helpers\Memory;
use Livewire\Component;

class Selection extends Component
{
    public $projects;
    public $selected;
    public $username;

    public function mount()
    {
        try {
            $github = new Github(Memory::user());
            $this->projects = $github->projects();
            $this->username = $github->user->nickname;
            $this->selected = [];
        } catch (ErrorException $e) {
            return redirect("/generate?phase=auth")->withException($e("Your login has expired, log in again please"));
        }

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
        Memory::setProjects(collect($this->selected)->map(function($project_name) {
                return collect($this->projects)->where("name", $project_name);
            }));

        return redirect("/generate?phase=about");
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
