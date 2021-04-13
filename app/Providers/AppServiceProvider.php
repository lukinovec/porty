<?php

namespace App\Providers;

use App\Helpers\Github;
use App\Helpers\Memory;
use Illuminate\Support\Facades\Cookie;
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
            $user = request()->cookie('socialite_user') ? unserialize(request()->cookie('socialite_user')) : false;
            return new Github($user);
        });

        $this->app->bind('logout', function($app) {
            $app->forgetInstance(Github::class);
            Cookie::queue(Cookie::forget('socialite_user'));
            return redirect('/generate?phase=auth');
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
