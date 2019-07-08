<?php

namespace App\Providers;

use App\Observers\ClubObserver;
use App\Observers\PlayerObserver;
use App\Player;
use Illuminate\Support\ServiceProvider;
use App\User;
use App\Observers\UserObserver;
use App\Club;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Club::observe(ClubObserver::class);
        Player::observe(PlayerObserver::class);
    }
}
