<?php

declare(strict_types = 1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Album;

interface AlbumRepositoryInterface
{

    public function with(Album $album);

    public function findBySearchPaginate(array $dataArray, int $page): LengthAwarePaginator;

    public function findAllPaginate(int $page): LengthAwarePaginator;

    public function findOneById(array $dataArray): ?Album;

    public function findByIsActiveTrue(): Collection;

    public function findBySearch(array $dataArray): Collection;

}