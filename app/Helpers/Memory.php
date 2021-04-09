<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Cookie;

class Memory {
    /**
     * Get github user from cache
     */
    public static function projects() {
        return cache(self::user()->nickname . "_projects") ?: false;
    }

    /**
     * Set github user to cache
     */
    public static function setProjects(\Illuminate\Support\Collection $projects, int $ttl = 440)
    {
        return cache([self::user()->nickname . "_projects", $projects], $ttl);
    }


    /**
     * Get user's github projects from cookies
     */
    public static function user() {
        $user = request()->cookie("github_user");
        if($user) {
            return unserialize($user);
        }
        $user = session("github_user") ?: false;
        return $user;
    }

    public static function setUser(\Laravel\Socialite\Contracts\User $user) {
        Cookie::queue(Cookie::make("github_user", serialize($user), 10));
    }
}