<?php

declare(strict_types = 1);

namespace App\Repositories;

use Log;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Exceptions\QueryException;
use App\Repositories\AlbumRepositoryInterface;
use App\Album;

class AlbumRepository implements AlbumRepositoryInterface
{
	/**
     * @var Album
     */
    private $model;

    public function with(Album $album): self
    {
        $this->model = $album;

        return $this;
    }

    public function findBySearchPaginate(array $dataArray, int $page): LengthAwarePaginator
    {
        return $this->model
            ->where('name', 'like', '%' . $dataArray['query'] . '%')
            ->orderBy('name', 'asc')
            ->paginate(Album::RESULTS_PER_PAGE, ['*'], 'page', $page);
    }

    public function findAllPaginate(int $page): LengthAwarePaginator
    {
        return $this->model
            ->orderBy('name', 'asc')
            ->paginate(Album::RESULTS_PER_PAGE, ['*'], 'page', $page);
    }

    public function findOneById(array $dataArray): ?Album
    {
        return $this->model
            ->where('id', $dataArray['id'])
            ->first();
    }

    public function findByIsActiveTrue(): Collection
    {
        return $this->model
            ->where('is_active', true)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function findBySearch(array $dataArray): Collection
    {
        return $this->model
            ->where('name', 'like', '%' . $dataArray['query'] . '%')
            ->limit(Album::RESULTS_PER_PAGE)
            ->orderBy('name', 'asc')
            ->get();
            //->toJson();
    }
}