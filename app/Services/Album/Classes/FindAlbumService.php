<?php

declare(strict_types = 1);

namespace App\Services\Album\Classes;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Exceptions\NotFoundException;
use App\Album;
use App\Services\Album\Interfaces\FindAlbumServiceInterface;
use App\Repositories\AlbumRepositoryInterface;


class FindAlbumService implements FindAlbumServiceInterface
{

    /**
     * @var AlbumRepositoryInterface
     */
    private $albumRepository;

    /**
     * Constructor
     */
    public function __construct(AlbumRepositoryInterface $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    /**
     * get either active or deactive album by album id
     * must be found or exception is called
     * 
     */
    public function findOneById(array $data): Album
    {
        $album = $this->albumRepository->with(new Album)->findOneById($data);

        if($album) {
            return $album;
        }

        throw new NotFoundException('This album could not be found');
    }

    /**
     * list all active albums unpaginated for dropdown lists
     *
     */
    public function findByIsActiveTrue(): Collection //OK
    {

        return $this->albumRepository->with(new Album)->findByIsActiveTrue();
    }

    /**
     * list all active albums unpaginated with search queries
     * includes both active and deactive
     *
     */
    public function findBySearch(array $data): Collection //OK
    {

        return $this->albumRepository->with(new Album)->findBySearch($data);
    }

    /**
     * list both active and deactive albums paginated
     *
     */
    public function findAllPaginate(int $page = 1): LengthAwarePaginator
    {

        return $this->albumRepository->with(new Album)->findAllPaginate($page);
    }

    /**
     * lists both active and deactive albums paginated with search queries
     * includes both active and deactive
     *
     */
    public function findBySearchPaginate(array $data, int $page = 1): LengthAwarePaginator
    {

        return $this->albumRepository->with(new Album)->findBySearchPaginate($data, $page);
    }

    
    
    
    
    

}
