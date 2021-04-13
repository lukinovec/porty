<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use App\Http\Phase;
use Livewire\Component;
use Illuminate\Support\Collection;

class Generate extends Component
{
    public $phase;
    protected $queryString = ['phase'];
    protected $listeners = ['move'];

    public function getPhases(): Collection
    {
        $github = app(Github::class);
        error_log('Getting phases...');
        return collect([
            new Phase(Auth::class, 'Log in with GitHub', fn() => (bool) $github->authenticated, true),
            new Phase(Selection::class, 'Select projects to show', fn() => (bool) $github->selected_projects, true),
            new Phase(Contact::class, 'Give others a way to contact you', fn() => strlen($github->contact) > 0),
            new Phase(About::class, 'Write something about yourself', fn() => strlen($github->bio) > 0),
        ]);
    }

    public function getCurrentPhase()
    {
        return $this->findPhase($this->phase);
    }

    public function hydrate()
    {
        if(! $this->getPhases()->where('type', $this->phase)) {
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
        return $operation == '+' ? $found + 1 : $found - 1;
    }

    public function move(string $operation)
    {
        $phase_is = [
            'required' => $this->getCurrentPhase()->required,
            'complete' => $this->getCurrentPhase()->isComplete(),
            'last' => $this->getNextPhaseIndex('+') === $this->getPhases()->count()
        ];

        if((($phase_is['required'] && $phase_is['complete']) ||
        ! $phase_is['required'] ||
        $operation == '-') && !$phase_is['last']) {

            $this->phase = $this->getPhases()[$this->getNextPhaseIndex($operation)]->type;

        } elseif($phase_is['last']) {

            $this->generatePortfolio();

        } else {

            session()->flash('message', $this->getCurrentPhase()->text);

        }
    }

    public function generatePortfolio()
    {
        return redirect('/portfolio');
    }

    public function render()
    {
        return view('livewire.generate')
        ->extends('template')
        ->section('content');
    }
}
