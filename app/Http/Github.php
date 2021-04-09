<?php

namespace App\Http;

use ErrorException;
use App\Helpers\Memory;
use Illuminate\Support\Facades\Http;

class Github {
    public $user;

    public function __construct(
        $user,
        public $just_get = false
    ) {
        if($user) {
            $this->user = $user;
        } else {
            throw new ErrorException("User expired, <a href='/'>log in again please</a>");
        }
    }

    private function get($endpoint) {
        return Http::withToken($this->user->token)->get($endpoint)->json();
    }

    public function projectPictures($project_name)
    {
        return $this->get("https://api.github.com/repos/{$this->user->nickname}/$project_name/contents/porty_pictures");
    }

    public function getProjects()
    {
        $projects = collect($this->get($this->user->user["repos_url"]))->map(function($project) {
            $images = $this->projectPictures($project["name"]);
            $project["pictures"] = isset($images["message"]) ? [] : $images;
            return $project;
        });

        return Memory::setProjects($projects, 600);
    }

    public function projects() {
        if($this->just_get) {
            return $this->getProjects();
        }
        return Memory::projects() ?: $this->getProjects();
    }
}