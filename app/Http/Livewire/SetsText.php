<?php

namespace App\Http\Livewire;

trait SetsText {
    public $text;
    public function mount(\App\Helpers\Github $github)
    {
        $this->text = $github->{$this->calledClass()} ?: '';
    }

    public function calledClass()
    {
        $class = explode('\\', strtolower(get_called_class()));
        return end($class);
    }

    public function save(\App\Helpers\Github $github)
    {
        $github->{$this->calledClass()} = $this->text;
        $this->emit('move', '+');
    }
}