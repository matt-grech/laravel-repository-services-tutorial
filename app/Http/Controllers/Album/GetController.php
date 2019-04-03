<?php declare(strict_types = 1);

namespace App\Http\Controllers\Album;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Exceptions\NotFoundException;
use App\Services\Album\Interfaces\FindAlbumServiceInterface;

class GetController extends Controller
{    
    /**
     * @var App\Services\Album\Interfaces\FindAlbumServiceInterface
     */
    private $findAlbum;

    public function __construct(FindAlbumServiceInterface $findAlbum)
    {
        $this->findAlbum = $findAlbum;
    }

    /**
     * Display albums with pagination
     * 
     * @group Album
     * @queryParam page required the page number of the results to view
     * @queryParam query the search query string
     */
    public function index(Request $request): JsonResponse
    {
        $query = $request->input('query');

        if($query) {
            return response()->json([
                'albums' => $this->findAlbum->findBySearchPaginate(
                    ['query' => $query ],
                    (int)$request->input('page')
                ),
            ], 200);
        }

        return response()->json([
            'albums' => $this->findAlbum->findAllPaginate((int)$request->input('page')),
        ], 200);
    }

    /**
     * Get specific album by id
     * 
     * @group Album
     * @queryParam id required the album id
     */
    public function edit($id): JsonResponse
    {
        return response()->json([
            'album' => $this->findAlbum->findOneById(['id' => (int)$id]),
        ], 200);
    }

    /**
     * Display all active albums without pagination
     * 
     * @group Album
     */
    public function list(): JsonResponse
    {
        return response()->json([
            'albums' => $this->findAlbum->findByIsActiveTrue(),
        ], 200);
    }

    /**
     * Search albums without pagination
     * 
     * @group Album
     * @queryParam query the search query string
     */
    public function search(Request $request): JsonResponse
    {
        $query = $request->input('query');

        if($query) {
            return response()->json([
                'albums' => $this->findAlbum->findBySearch(['query' => $query ]),
            ], 200);
        }

        return response()->json([
            'albums' => [],
        ], 200);
    }
}
