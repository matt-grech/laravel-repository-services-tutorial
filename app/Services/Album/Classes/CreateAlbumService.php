<?php

declare(strict_types = 1);

namespace App\Services\Album\Classes;

use App\Album;
use App\Writes\AlbumWriteInterface;
use App\Services\Album\Interfaces\CreateAlbumServiceInterface;


class CreateAlbumService implements CreateAlbumServiceInterface
{
    /**
     * @var AlbumWriteInterface
     */
    private $createAlbum;

    /**
     * Constructor
     */
    public function __construct(AlbumWriteInterface $createAlbum)
    {
        $this->createAlbum = $createAlbum;
    }

    public function create(array $requestData): Album
    {
        $create = $this->createAlbum->with(new Album, $requestData);
        $create->setMain();
        $create->setActivation();

        return $create->getAlbum();
    }

}
