<?php
namespace App\Helpers;
use Closure;

class Memory {

    public function __construct(private Github $github) {}

    private function userCheck(Closure $closure) {
        if($this->github) {
            return $closure();
        }
        return false;
    }

    public function set(array $to_set, int $ttl = 1200)
    {
        return $this->userCheck(fn() => cache($to_set, $ttl) ?: false);
    }

    public function get(string $to_get)
    {
        return $this->userCheck(fn() => cache($to_get) ?: false);
    }
}