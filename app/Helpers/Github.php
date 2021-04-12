<?php

namespace App\Helpers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;

class Github {
    public array $selected_projects = [];

    public function __construct(\Laravel\Socialite\Two\User $user) {
        $this->user_details = $user;
        $this->nickname = $user->nickname;
        $this->token = $user->token;
        $this->projects = (new GithubFetch([
            'token' => $this->token,
            'nickname' => $this->nickname,
            'repos_url' => $user['repos_url']
        ]))->projects();
    }

    public function save(string $propertyName = '', $value = '')
    {
        if($propertyName && $value) {
            $this->$propertyName = $value;
        }
        Cookie::queue(Cookie::make('socialite_user', serialize($this->user_details), 8));
        return $this;
    }
}