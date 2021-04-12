<?php
namespace App\Helpers;
use Closure;

class Memory {

    public function __construct() {}

    private function userCheck(Closure $closure) {
        if(app(Github::class)) {
            return $closure();
        }
        return false;
    }

    /**
     * @param array $to_set [key => value]
     */
    public function set(array $to_set, int $ttl = 440)
    {
        return $this->userCheck(fn() => cache($to_set, $ttl));
    }

    /**
     * @param array $to_get [key => value]
     */
    public function get(string $to_get)
    {
        return $this->userCheck(fn() => cache($to_get));
    }
}