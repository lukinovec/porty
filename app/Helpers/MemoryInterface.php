<?php
namespace App\Helpers;

interface MemoryInterface {
    public static function get(string $key);
    public static function store(string $key, $value);
}