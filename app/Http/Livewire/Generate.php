<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Phase;

class Generate extends Component
{
    private $currentPhase;
    private $phases;

    public function mount($currentPhase = "auth")
    {
        $this->phases = collect([
            new Phase("auth", "Log in with GitHub", ["user" => null]),
            new Phase("selection", "Select projects to show", ["projects" => null]),
            new Phase("about", "Write something about yourself", ["input" => null]),
        ]);

        $this->currentPhase = $this->phases->first(function($phase) use ($currentPhase) {
            return $phase->type === $currentPhase;
        });

        abort_if($this->currentPhase === null, 404, "Phase not found");
    }

    public function render()
    {
        return view('livewire.generate', ["phases" => $this->phases, "currentPhase" => $this->currentPhase])
        ->extends('template')
        ->section('content');
    }
}
