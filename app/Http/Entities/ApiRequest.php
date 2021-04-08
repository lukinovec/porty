<?php
namespace App\Http\Entities;

use Illuminate\Support\Facades\Http;

class ApiRequest implements RequestInterface {
    public static function get(string $endpoint, $user) {
        return Http::withToken($user->token)->get($endpoint)->json();
    }
}