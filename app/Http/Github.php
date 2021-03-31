<?php

namespace App\Http;

use Illuminate\Support\Facades\Http;

class Github {
    public function __construct(string $name) {
        $this->name = $name;
    }

    private function get($endpoint) {
        $private_access_token = getenv("GITHUB_PERSONAL_ACCESS_TOKEN");
        return Http::get($endpoint, [
            "authorization" => "token $private_access_token"
        ])->json();
    }

    public function user() {
        return $this->get("https://api.github.com/users/$this->name");
    }

    public function projects() {
        return $this->get("https://api.github.com/users/$this->name/repos");
    }
}