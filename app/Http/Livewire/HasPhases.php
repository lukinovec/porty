<?php

namespace App\Http\Livewire;

use App\Classes\Phase;
use App\Helpers\Github;
use Illuminate\Support\Collection;

/**
 * phases stored in getPhases() method
 */
trait HasPhases
{
    public function getPhases(): Collection
    {
        $github = app(Github::class);
        error_log('Getting phases...');

        return collect([
            new Phase(
                Auth::class,
                'Log in with GitHub',
                fn () => (bool) $github->authenticated,
                true
            ),
            new Phase(
                Selection::class,
                'Select projects to show',
                fn () => (bool) $github->selected_projects,
                true
            ),
            new Phase(
                Customize::class,
                'Customize the details',
                fn () => (bool) $github->selection_customized
            ),
            new Phase(
                Contact::class,
                'Give others a way to contact you',
                fn () => strlen($github->contact) > 0
            ),
            new Phase(
                About::class,
                'Write something about yourself',
                fn () => strlen($github->bio) > 0
            ),
        ]);
    }
}
