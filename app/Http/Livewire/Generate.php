<?php

namespace App\Http\Livewire;

use App\Http\Phase;
use Livewire\Component;
use Illuminate\Support\Collection;

class Generate extends Component
{
    public $phase;
    protected $queryString = ['phase'];

    public function getPhasesProperty(): Collection
    {
        return collect([
            new Phase("auth", "Log in with GitHub", true),
            new Phase("selection", "Select projects to show", true),
            new Phase("about", "Write something about yourself", true),
        ]);
    }

    public function hydrate()
    {
        if(! $this->phases->where("type", $this->phase)) {
            abort(404);
        }
    }

    public function getNextPhase(string $operation)
    {
        $found = $this->phases->search(function($phase) {
            return $phase->type === $this->phase;
        });
        return $operation == "+" ? $found + 1 : $found - 1;
    }

    public function move(string $operation)
    {
        $index = $this->getNextPhase($operation);
        $next = $this->phases[$index];
        $this->phase = $this->phases[$index]->type;
    }

    public function render()
    {
        return view('livewire.generate', [
            "phases" => $this->phases,
            "currentPhase" => $this->phases->first(function($phase) {
                return $phase->type === $this->phase;
             })
        ])
        ->extends('template')
        ->section('content');
    }
}
