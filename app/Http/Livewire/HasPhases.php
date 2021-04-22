<?php

namespace App\Http\Livewire;

use App\Classes\Phase;
use App\Helpers\Github;
use Illuminate\Support\Collection;

/**
 * phase methods
 * @method getPhases
 * @method getCurrent
 * @method getNextPhaseIndex
 * @method findPhase
 *
 */
trait HasPhases
{
    public function getPhases(): Collection
    {
        $github = app(Github::class);
        error_log('Getting phases...');

        return collect([
            new Phase(
                livewire_classname: Auth::class,
                text: 'Log in with GitHub',
                completionCheck: fn () => (bool) $github->authenticated,
                required: true
            ),
            new Phase(
                livewire_classname: Selection::class,
                text: 'Select projects to show',
                completionCheck: fn () => (bool) $github->selected_projects,
                required: true
            ),
            new Phase(
                livewire_classname: Contact::class,
                text: 'Give others a way to contact you',
                completionCheck: fn () => strlen($github->contact) > 0
            ),
            new Phase(
                livewire_classname: About::class,
                text: 'Write something about yourself',
                completionCheck: fn () => strlen($github->bio) > 0
            ),
            new Phase(
                livewire_classname: Customize::class,
                text: 'Customize your projects',
                completionCheck: fn () => (bool) $github->selection_customized
            ),
        ]);
    }

    public function getCurrentPhase()
    {
        return $this->findPhase($this->phase);
    }

    public function findPhase(string $type): \App\Classes\Phase
    {
        return $this->getPhases()->first(function ($phase) use ($type) {
            return $phase->type === $type;
        });
    }

    public function getNextPhaseIndex(string $operation): int
    {
        $found = $this->getPhases()->search(function ($phase) {
            return $phase->type === $this->phase;
        });

        return $operation == '+' ? $found + 1 : $found - 1;
    }
}
