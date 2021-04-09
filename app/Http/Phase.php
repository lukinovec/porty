<?php
namespace App\Http;

use Closure;

class Phase {
    public function __construct(
        public string $type,
        public string $text,
        public bool $isComplete
    ) {}
}