<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use App\Helpers\Memory;
use Livewire\Component;

class Selection extends Component
{
    public $selected;
    public $projects;

    public function mount()
    {
        $github = app(Github::class);
        $this->projects = $github->projects();
        if((new Memory)->get($github->user->nickname . '_selected_projects')) {
            $this->selected = array_map(fn($project) => $project["name"], (new Memory)->get($github->user->nickname . '_selected_projects'));
        } else {
            $this->selected = [];
        }
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
        (new Memory)->set([app(Github::class)->user->nickname . '_selected_projects' => $this->select()]);

        $this->emit("move", "+");
    }

    public function render()
    {
        return view('livewire.selection', [
            "username" => app(Github::class)->user->nickname,
            "projects" => app(Github::class)->projects(),
            "selected" => $this->selected
        ])
        ->extends('livewire.generate')->section('phase');
    }
}
