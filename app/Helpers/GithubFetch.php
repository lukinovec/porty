<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class GithubFetch {
    public function __construct(private array $github) {}

    private function get(string $endpoint) {
        return Http::withToken($this->github['token'])->get($endpoint)->json();
    }

    public function pictures(string $project_name)
    {
        return $this->get("https://api.github.com/repos/{$this->github['nickname']}/$project_name/contents/porty_pictures");
    }

    public function projects()
    {
        return array_map(function($project) {
            $images = $this->pictures($project['name']);
            $project['pictures'] = isset($images['message']) ? [] : $images;
            return $project;
        }, $this->get($this->github['repos_url']));
    }
}