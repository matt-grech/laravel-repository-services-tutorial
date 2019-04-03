<?php

declare(strict_types = 1);

namespace App\Services\Album\Interfaces;

use App\Album;

interface UpdateAlbumServiceInterface
{

    public function update(array $requestData, int $id): Album;

}
