<?php

namespace App\Http\Livewire;

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
        $github = new Github(Memory::user());
        $this->projects = $github->projects();
        $this->username = $github->user->nickname;
        $this->selected = array_map(fn($project) => $project["name"], Memory::selectedProjects());
    }

    public function select()
    {
        $selection = [];

        foreach ($this->selected as $selected_project_name) {
            foreach($this->projects as $project) {
                if($project["name"] === $selected_project_name) array_push($selection, $project);
            }
        }

        return $selection;
    }

    public function finalize()
    {
        Memory::setSelectedProjects($this->select());

        $this->emit("move", "+");
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
