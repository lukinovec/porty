<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;

class Selection extends Component
{
    public $selected = [];
    public $projects = [];

    public function mount(Github $github)
    {
        $this->projects = $github->projects;
        $selected_projects = $github->selected_projects;
        if($selected_projects) {
            collect(array_map(fn($project) => $project['name'], $selected_projects))->each(function($project) {
                $this->selected[] = $project;
            });
        }
    }

    public function updatedSelected()
    {
        error_log('New project selected!');
    }

    public function next(Github $github)
    {
        $github->selected_projects = collect($github->projects)->filter(function($project) {
            return collect($this->selected)->contains($project['name']);
        })->toArray();

        $github->save('selected_projects', $github->selected_projects);
        $this->emit('move', '+');
    }

    public function render()
    {
        return view('livewire.selection')
        ->extends('livewire.generate')->section('phase');
    }
}
