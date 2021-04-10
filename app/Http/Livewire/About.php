<?php

namespace App\Http\Livewire;

use Livewire\Component;

class About extends Component
{
    public function sendBio(string $bio)
    {
        dd($bio);
        $this->emit("move", "+");
    }

    public function render()
    {
        return view('livewire.about')
        ->extends('livewire.generate')->section('phase');
    }
}
