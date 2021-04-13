<?php

namespace App\Http\Livewire;

use Livewire\Component;

class About extends Component
{
    use SetsText;

    public function render()
    {
        return view('livewire.about')
        ->extends('livewire.generate')->section('phase');
    }
}
