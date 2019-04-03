<?php

namespace App\Providers\Album;

use Illuminate\Support\ServiceProvider;
use App\Services\Album\Classes\FindAlbumService;
use App\Services\Album\Interfaces\FindAlbumServiceInterface;
use App\Repositories\AlbumRepository;

class FindAlbumServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap services.
     *
     */
    public function boot(): void
    {
        //
    }

    /**
     * Register services.
     *
     */
    public function register(): void
    {
        $this->app->bind(FindAlbumServiceInterface::class, function($app) {
                return new FindAlbumService(
                    $app->make(AlbumRepository::class)
                );
        });
    }
}
