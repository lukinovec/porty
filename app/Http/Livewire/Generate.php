<?php

namespace App\Http\Livewire;

use App\Helpers\Memory;
use App\Http\Phase;
use Livewire\Component;
use Illuminate\Support\Collection;

class Generate extends Component
{
    public $phase;
    protected $queryString = ["phase"];
    protected $listeners = ["move"];

    public function getPhases(): Collection
    {

        return collect([
            new Phase(Auth::class, "Log in with GitHub", fn() => (bool) Memory::user(), true),
            new Phase(Selection::class, "Select projects to show", fn() => (bool) Memory::selectedProjects(), true),
            new Phase(Contact::class, "Give others a way to contact you", fn() => (bool) Memory::userBio()),
            new Phase(About::class, "Write something about yourself", fn() => (bool) Memory::userBio()),
        ]);
    }

    public function getCurrentPhase()
    {
        return $this->findPhase($this->phase);
    }

    public function hydrate()
    {
        if(! $this->getPhases()->where("type", $this->phase)) {
            abort(404);
        }
    }

    public function findPhase(string $type): Phase
    {
        return $this->getPhases()->first(function($phase) use ($type) {
            return $phase->type === $type;
        });
    }


    public function getNextPhaseIndex(string $operation): int
    {
        $found = $this->getPhases()->search(function($phase) {
            return $phase->type === $this->phase;
        });
        return $operation == "+" ? $found + 1 : $found - 1;
    }

    public function move(string $operation)
    {
        if(($this->getCurrentPhase()->required && $this->getCurrentPhase()->isComplete())
        || !$this->getCurrentPhase()->required || $operation == "-") {
            $this->phase = $this->getPhases()[$this->getNextPhaseIndex($operation)]->type;
        } else {
            session()->flash("message", $this->getCurrentPhase()->text);
        }
    }

    public function render()
    {
        return view('livewire.generate')
        ->extends('template')
        ->section('content');
    }
}
