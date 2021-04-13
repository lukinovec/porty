<?php

namespace App\Helpers;
class Github {
    public $authenticated = true;
    public $user_details = null;
    public $nickname = '';
    private $selected_projects = [];
    private $memory = null;

    public function __construct(\Laravel\Socialite\Two\User|bool $user) {
        if($user) {
            $this->user_details = $user;
            $this->nickname = $user->nickname;
            $this->memory = new Memory($this);
        } else {
            $this->authenticated = false;
        }
    }

    public function __get(string $propertyName = '')
    {
        if($this->authenticated) {
            switch ($propertyName) {
                case 'projects':
                    return (new GithubFetch([
                        'token' => $this->user_details->token,
                        'nickname' => $this->nickname,
                        'repos_url' => $this->user_details['repos_url']
                        ]))->projects();

                default:
                    return $this->memory->get($this->nickname . '_' . $propertyName);
            }
        }
        return false;
    }

    public function __set(string $propertyName = '', $value = false)
    {
        return $this->save($propertyName, $value);
    }

    public function save(string $propertyName = '', $value = false)
    {
        if(! $value && $this->$propertyName) {
            $value = $this->$propertyName;
        }
        return $this->memory->set([$this->nickname . '_' . $propertyName => $value]);
    }
}