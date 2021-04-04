<?php

namespace App\Http;

use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class Github {
    public $user;
    public function __construct($user) {
        $this->user = $user;
    }

    private function get($endpoint) {
        return Http::withToken(getenv("GITHUB_PERSONAL_ACCESS_TOKEN"))->get($endpoint)->json();
    }

    // public function user() {
    //     $response = $this->get("https://api.github.com/users/$this->name");
    //     if(isset($response["message"])) {
    //         return abort(404, "User not found");
    //     } else {
    //         $user = Socialite::driver('github')->user();
    //         dd($user);
    //         return $response;
    //     }
    // }

    public function projectPictures($project_name)
    {
        return $this->get("https://api.github.com/repos/{$this->user->nickname}/$project_name/contents/porty_pictures");
    }

    public function projects() {
        return collect($this->get("https://api.github.com/users/{$this->user->nickname}/repos"))->map(function($project) {
            $project["pictures"] = isset($this->projectPictures($project["name"])["message"]) ? [] : $this->projectPictures($project["name"]);
            return $project;
        });
    }
}