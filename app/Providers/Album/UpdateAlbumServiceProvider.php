<?php

namespace App\Providers\Album;

use Illuminate\Support\ServiceProvider;
use App\Services\Album\Classes\UpdateAlbumService;
use App\Services\Album\Interfaces\UpdateAlbumServiceInterface;
use App\Writes\AlbumWrite;
use App\Repositories\AlbumRepository;

class UpdateAlbumServiceProvider extends ServiceProvider
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
        $this->app->bind(UpdateAlbumServiceInterface::class, function($app) {
                return new UpdateAlbumService(
                    $app->make(AlbumWrite::class),
                    $app->make(AlbumRepository::class)
                );
        });
    }
}
