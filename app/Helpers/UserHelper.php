<?php
namespace App\Helpers;

use Closure;

function userCheck(Closure $closure)
{
    if(Memory::user()) {
        return $closure();
    }
    return false;
}