<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class GithubFetch {
    public function __construct(private Github $github) {}

    private function get(string $endpoint) {
        return Http::withToken($this->github->user->token)->get($endpoint)->json();
    }

    public function projects()
    {
        $projects = collect($this->get($this->github->user["repos_url"]))->map(function($project) {
            $images = $this->pictures($project["name"]);
            $project["pictures"] = isset($images["message"]) ? [] : $images;
            return $project;
        });
        return (new Memory)->set([$this->github->user->nickname . "_projects" => $projects], 600);
    }

    public function pictures(string $project_name)
    {
        return $this->get("https://api.github.com/repos/{$this->github->user->nickname}/$project_name/contents/porty_pictures");
    }
}