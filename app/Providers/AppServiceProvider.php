<?php

namespace App\Providers;

use App\Helpers\Github;
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
                // abort(404, 'Your portfolio might have expired<br>  <a href='/auth/redirect'>click here to log in again</a>');
                return false;
            }
            return (new Github($user));
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
