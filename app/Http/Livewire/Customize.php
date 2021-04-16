<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;

class Customize extends Component
{
    public $projects = [];
    public $updates = [];

    protected $listeners = ['projectUpdated' => 'updateProject'];

    public function mount(Github $github)
    {
        $this->projects = $github->selected_projects;
        $this->updates = $github->selected_projects;
    }

    public function updateProject($updated_project)
    {
        $index = collect($this->projects)->search(function ($project) use ($updated_project) {
            return $updated_project['name'] === $project['name'];
        });
        $this->updates[$index] = $updated_project;
    }

    public function save(Github $github)
    {
        $github->selected_projects = $this->updates;
        $github->selection_customized = true;
        $this->emit('move', '+');
    }

    public function render()
    {
        return view('livewire.customize');
    }
}
