<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use App\Helpers\Memory;
use Livewire\Component;

class Selection extends Component
{
    public $selected = [];

    public function mount()
    {
        $selected_projects = app(Github::class)->selected_projects;
        if($selected_projects) {
            $this->selected = array_map(fn($project) => $project['name'], $selected_projects);
        }
        // else {
        //     $this->selected = [];
        // }
    }

    public function select()
    {
        $selection = [];

        foreach ($this->selected as $selected_project_name) {
            foreach(app(Github::class)->projects as $project) {
                if($project['name'] === $selected_project_name) array_push($selection, $project);
            }
        }

        return $selection;
    }

    public function finalize()
    {
        app(Github::class)->save('selected_projects', $this->select());
        $this->emit('move', '+');
    }

    public function render()
    {
        return view('livewire.selection', [
            'github' => app(Github::class),
            'selected' => $this->selected
        ])
        ->extends('livewire.generate')->section('phase');
    }
}
