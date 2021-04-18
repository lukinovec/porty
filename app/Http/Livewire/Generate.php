<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Generate extends Component
{
    public $phase;
    protected $queryString = ['phase'];
    protected $listeners = ['move'];
    use HasPhases;

    public function hydrate()
    {
        if (!$this->getPhases()->where('type', $this->phase)) {
            abort(404);
        }
    }

    public function move(string $operation)
    {
        $phase_is = [
            'required' => $this->getCurrentPhase()->required,
            'complete' => $this->getCurrentPhase()->isComplete(),
        ];

        if (
            ($phase_is['required'] && $phase_is['complete']) ||
            !$phase_is['required'] ||
            $operation == '-'
        ) {
            $this->phase = $this->getPhases()[$this->getNextPhaseIndex($operation)]->type;
        } else {
            session()->flash('message', $this->getCurrentPhase()->text);
        }
    }

    public function render()
    {
        return view('livewire.generate')
        ->extends('template')
        ->section('content');
    }
}
