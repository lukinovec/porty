<?php
namespace App\Http\Entities;

interface RequestInterface {
    public static function get(string $endpoint, $user);
}