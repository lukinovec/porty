<?php
namespace App\Http;

use Closure;

class Phase {
    public string $type;

    public function __construct(
        string $livewire_classname,
        public string $text,
        public Closure $completionCheck,
        public bool $required = false
    ) {
        $type = explode("\\", strtolower($livewire_classname));
        $this->type = end($type);
    }

    public function isComplete()
    {
        return $this->completionCheck->call($this);
    }
}