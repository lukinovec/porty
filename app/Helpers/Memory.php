<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Cookie;
class Memory {
    /**
     * TBD - make a separate class for projects with user check in construct
     * Get github user from cache
     */
    public static function projects() {
        return userCheck(fn() => cache(self::user()->nickname . "_projects") ?: []);
    }

    /**
     * TBD - make a separate class for projects with user check in construct
     * Set github user to cache
     */
    public static function setProjects(\Illuminate\Support\Collection $projects, int $ttl = 440): bool {
        return userCheck(fn() => cache([self::user()->nickname . "_projects" => $projects], $ttl));
    }

    public static function selectedProjects(): array|bool {
        return userCheck(fn() => cache(self::user()->nickname . "_selected_projects") ?: []);
    }

    public static function setSelectedProjects(array $selected) {
        return userCheck(function() use ($selected) {
            $cache_key = self::user()->nickname . "_selected_projects";
            return cache([$cache_key => $selected]);
        });
    }


    /**
     * Get user's github projects from cookies
     */
    public static function user() {
        $user = request()->cookie("github_user");
        if($user) {
            return unserialize($user);
        }
        return session("github_user") ?: false;
    }

    public static function userBio()
    {
        return userCheck(fn() => cache(self::user()->nickname . "_bio"));
    }

    public static function setUser(\Laravel\Socialite\Contracts\User $user) {
        Cookie::queue(Cookie::make("github_user", serialize($user), 8));
    }

    public static function setUserBio($bio)
    {
        return userCheck(fn() => cache([self::user()->nickname . "_bio", $bio]));
    }

    public static function userForget()
    {
        Cookie::queue(Cookie::forget("github_user"));
        return redirect("/generate?phase=auth");
    }


}