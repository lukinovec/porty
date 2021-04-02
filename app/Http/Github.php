<?php

namespace App\Http;

use Illuminate\Support\Facades\Http;

class Github {
    public function __construct(string $name) {
        $this->name = $name;
    }

    private function get($endpoint) {
        return Http::withToken(getenv("GITHUB_PERSONAL_ACCESS_TOKEN"))->get($endpoint)->json();
    }

    public function user() {
        return $this->get("https://api.github.com/users/$this->name");
    }

    public function projectPictures($project_name)
    {
        return $this->get("https://api.github.com/repos/$this->name/$project_name/contents/porty_pictures");
    }

    public function projects() {
        return collect($this->get("https://api.github.com/users/$this->name/repos"))->map(function($project) {
            $project["pictures"] = isset($this->projectPictures($project["name"])["message"]) ? [] : $this->projectPictures($project["name"]);
            return $project;
        });
    }
}