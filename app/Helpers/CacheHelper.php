<?php
namespace App\Helpers;

class CacheHelper extends Memory implements MemoryInterface
{
    public static function get($key)
    {
        return cache($key) ?: false;
    }

    public static function store($key, $value, $ttl = 440)
    {
        return cache([$key => $value], $ttl) ?: false;
    }
}