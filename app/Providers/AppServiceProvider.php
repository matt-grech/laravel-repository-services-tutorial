<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\Album\UpdateAlbumServiceProvider;
use App\Providers\Album\CreateAlbumServiceProvider;
use App\Providers\Album\FindAlbumServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(UpdateAlbumServiceProvider::class);
        $this->app->register(CreateAlbumServiceProvider::class);
        $this->app->register(FindAlbumServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
