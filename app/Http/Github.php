<?php

namespace App\Http;

use Illuminate\Support\Facades\Http;

class Github {
    public $user;
    public function __construct($user) {
        $this->user = $user;
    }

    private function get($endpoint) {
        return Http::withToken($this->user->token)->get($endpoint)->json();
    }

    public function projectPictures($project_name)
    {
        return $this->get("https://api.github.com/repos/{$this->user->nickname}/$project_name/contents/porty_pictures");
    }

    public function projects() {
        if(cache("{$this->user->nickname}_projects")) {
            return cache("{$this->user->nickname}_projects");
        }

        $projects = collect($this->get($this->user->user["repos_url"]))->map(function($project) {
            $project["pictures"] = isset($this->projectPictures($project["name"])["message"]) ? [] : $this->projectPictures($project["name"]);
            return $project;
        });

        cache(["{$this->user->nickname}_projects" => $projects]);
        return $projects;
    }
}