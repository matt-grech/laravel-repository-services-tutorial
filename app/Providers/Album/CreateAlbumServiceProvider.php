<?php

namespace App\Providers\Album;

use Illuminate\Support\ServiceProvider;
use App\Services\Album\Classes\CreateAlbumService;
use App\Services\Album\Interfaces\CreateAlbumServiceInterface;
use App\Writes\AlbumWrite;

class CreateAlbumServiceProvider extends ServiceProvider
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
        $this->app->bind(CreateAlbumServiceInterface::class, function($app) {
                return new CreateAlbumService(
                    $app->make(AlbumWrite::class)
                );
        });
    }
}
