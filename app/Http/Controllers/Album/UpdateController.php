<?php declare(strict_types = 1);

namespace App\Http\Controllers\Album;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Album\Interfaces\UpdateAlbumServiceInterface;
use App\Requests\Album\UpdateAlbumValidation;

class UpdateController extends Controller
{
    
    /**
     * @var App\Services\Album\Interfaces\UpdateAlbumServiceInterface
     */
    private $updateAlbum;


    public function __construct(UpdateAlbumServiceInterface $updateAlbum)
    {
        $this->updateAlbum = $updateAlbum;
    }

    /**
     * Update an existing album
     * 
     * @group Album
     * @bodyParam name string required name of the new album
     * @bodyParam artist string required the artist of the album
     * @bodyParam genre string required the genre of the album
     * @bodyParam condition string required the condition of the album
     * @bodyParam is_active boolean required the activate or deactivate the album
     */
    public function update(UpdateAlbumValidation $request, $id): JsonResponse
    {
        return response()->json([
            'album' => $this->updateAlbum->update($request->all(), (int)$id),
        ], 200);
    }
}