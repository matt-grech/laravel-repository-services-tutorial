<?php

declare(strict_types = 1);

namespace App\Services\Album\Interfaces;

use App\Album;

interface CreateAlbumServiceInterface
{

    public function create(array $requestData): Album;

}
