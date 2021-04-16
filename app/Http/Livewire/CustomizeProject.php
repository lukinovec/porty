<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CustomizeProject extends Component
{
    public $project;
    public $updatable;

    public function mount($project)
    {
        $this->project = $project;
        $this->updatable = $project;
    }

    public function updatedUpdatable()
    {
        $this->emit('projectUpdated', $this->updatable);
    }

    public function render()
    {
        return view('livewire.customize-project');
    }
}
