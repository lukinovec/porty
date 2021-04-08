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
}