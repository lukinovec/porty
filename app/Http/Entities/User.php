<?php
namespace App\Http\Entities;

abstract class User implements UserInterface {
    protected $data;
    abstract protected function authenticate();

    public function findMedia(string $endpoint)
    {
        return MediaFormatter::format(ApiRequest::get($endpoint, $this->data));
    }
}