<?php
namespace App\Http\Entities;

use Exception;

class GithubUser extends User {
    public function __construct()
    {
        $this->authenticate();
    }

    protected function authenticate()
    {
        $this->data = session("github_user") ?: unserialize(request()->cookie("github_user"));
        if(!$this->data) {
            throw new Exception("Invalid user, your portfolio might have expired<br>  <a href='/auth/redirect'>click here to log in again</a>", 1);
        }
    }

    public function getProjects()
    {
        $projects = collect($this->get($this->user->user["repos_url"]))->map(function($project) {
            $images = $this->projectPictures($project["name"]);
            $project["pictures"] = isset($images["message"]) ? [] : $images;
            return $project;
        });

        cache(["{$this->user->nickname}_projects" => $projects], 600);
        return $projects;
    }

    public function projects() {
        if($this->just_get) {
            return $this->getProjects();
        }
        return cache("{$this->user->nickname}_projects") ?: $this->getProjects();
    }
}