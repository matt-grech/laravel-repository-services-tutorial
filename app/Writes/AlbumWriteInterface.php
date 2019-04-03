<?php

declare(strict_types = 1);

namespace App\Writes;

use App\Album;

interface AlbumWriteInterface
{
    public function with(Album $album, array $requestData);

    /**
     * album creates or updates album
     *
     */
    public function setMain(): void;

    /**
     * activate or deactivate the album
     *
     */
    public function setActivation(): void;

    /**
     * returns updated album object
     *
     */
    public function getAlbum(): Album;

}