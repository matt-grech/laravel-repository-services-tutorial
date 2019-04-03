<?php

declare(strict_types = 1);

namespace App\Services\Album\Classes;

use App\Exceptions\NotFoundException;
use App\Album;
use App\Writes\AlbumWriteInterface;
use App\Repositories\AlbumRepositoryInterface;
use App\Services\Album\Interfaces\UpdateAlbumServiceInterface;


class UpdateAlbumService implements UpdateAlbumServiceInterface
{
    /**
     * @var AlbumWriteInterface
     */
    private $updateAlbum;

    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    /**
     * Constructor
     */
    public function __construct(AlbumWriteInterface $updateAlbum, AlbumRepositoryInterface $albumRepository)
    {
        $this->updateAlbum = $updateAlbum;
        $this->albumRepository = $albumRepository;
    }

    public function update(array $requestData, int $id): Album
    {
        $album = $this->albumRepository->with(new Album)->findOneById(['id' => $id]);

        if($album) {
            $update = $this->updateAlbum->with($album, $requestData);
            $update->setMain();

            return $update->getAlbum();
        }

        throw new NotFoundException('Album Not Found!');
    }

}
