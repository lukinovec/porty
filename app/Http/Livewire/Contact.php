<?php

namespace App\Http\Livewire;

use App\Helpers\Github;
use Livewire\Component;

class Contact extends Component
{
    use SetsText;

    public function render()
    {
        return view('livewire.contact', [
            'github' => app(Github::class),
        ])
        ->extends('livewire.generate')->section('phase');
    }
}
