<?php

namespace App\Http\Livewire;
use Livewire\Component;

class Contact extends Component
{
    use SetsText;

    public function render()
    {
        return view('livewire.contact')
        ->extends('livewire.generate')->section('phase');
    }
}
