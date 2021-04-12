<?php

namespace App\Providers;

use App\Helpers\Github;
use App\Helpers\Memory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Github::class, function($app) {
            $user = session('github_user') ?: unserialize(request()->cookie('github_user'));
            if(!$user) {
                return false;
            }
            return (new Github($user));
        });

        $this->app->bind(Memory::class, function($app) {
            return new Memory;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
