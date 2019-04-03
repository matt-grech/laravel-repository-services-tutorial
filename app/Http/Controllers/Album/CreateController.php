<?php declare(strict_types = 1);

namespace App\Http\Controllers\Album;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Album\Interfaces\CreateAlbumServiceInterface;
use App\Requests\Album\CreateAlbumValidation;

class CreateController extends Controller
{
    
    /**
     * @var App\Services\Album\Interfaces\CreateAlbumServiceInterface
     */
    private $createAlbum;


    public function __construct(CreateAlbumServiceInterface $createAlbum)
    {
        $this->createAlbum = $createAlbum;
    }

    /**
     * Create a new album
     * 
     * @group Album
     * @bodyParam name string required name of the new album
     * @bodyParam artist string required the artist of the album
     * @bodyParam genre string required the genre of the album
     * @bodyParam condition string required the condition of the album
     * @bodyParam is_active boolean required the activate or deactivate the album
     */
    public function store(CreateAlbumValidation $request): JsonResponse
    {
        return response()->json([
            'album' => $this->createAlbum->create($request->all()),
        ], 200);
    }
}