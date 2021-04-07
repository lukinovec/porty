<?php
namespace App\Http;
class Phase {
    public function __construct(
        public string $type,
        public string $text,
        $args
    ) {
        foreach ($args as $key => $arg) {
            $this->$key = $arg;
        }
    }
}