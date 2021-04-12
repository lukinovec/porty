<?php

namespace App\Helpers;
use Illuminate\Support\Facades\Cookie;

class Github {
    private Memory $memory;
    public function __construct(
        public $user
    ) {
        $this->memory = new Memory;
    }

    public function forget()
    {
        Cookie::queue(Cookie::forget("github_user"));
        return redirect("/generate?phase=auth");
    }

    public function projects($just_get = false) {
        if($just_get) {
            return (new GithubFetch($this))->projects();
        }
        return $this->memory->get($this->user->nickname . '_projects') ?: (new GithubFetch($this))->projects();
    }
}