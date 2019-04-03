<?php

declare(strict_types = 1);

namespace App\Services\Album\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Album;

interface FindAlbumServiceInterface
{

    /**
     * get either active or deactive album by album id
     * must be found or exception is called
     * 
     */
    public function findOneById(array $data): Album;

    /**
     * list all active albums unpaginated for dropdown lists
     *
     */
    public function findByIsActiveTrue(): Collection;

    /**
     * list all active albums unpaginated with search queries
     * includes both active and deactive
     *
     */
    public function findBySearch(array $data): Collection;

    /**
     * list both active and deactive albums paginated
     *
     */
    public function findAllPaginate(int $page = 1): LengthAwarePaginator;

    /**
     * lists both active and deactive albums paginated with search queries
     * includes both active and deactive
     *
     */
    public function findBySearchPaginate(array $data, int $page = 1): LengthAwarePaginator;

}
