<?php

namespace App\Http\Controllers\api\Assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetStoreRequest;
use App\Http\Resources\AssetDeleteResource;
use App\Http\Resources\AssetResource;
use App\Http\Resources\AssetsResource;
use App\Http\Resources\AssetsResourceInterface;
use App\Repositories\Assets\AssetRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AssetsController extends Controller
{
    private AssetRepositoryInterface $assetRepository;

    public function __construct(AssetRepositoryInterface $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json(
            new AssetsResource($this->assetRepository->getUserAssetsWithTotals(Auth::id(), config('services.conversion_currency')))
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  AssetStoreRequest  $assetStoreRequest
     * @return JsonResponse
     */
    public function store(AssetStoreRequest $assetStoreRequest)
    {
        $data = $assetStoreRequest->validated();
        $data['user_id'] = Auth::id();

        return response()->json(new AssetResource($this->assetRepository->create($data)));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return response()->json(new AssetResource($this->assetRepository->getUserAsset(Auth::id(), $id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AssetStoreRequest  $assetStoreRequest
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(AssetStoreRequest $assetStoreRequest, int $id): JsonResponse
    {
        return response()->json(new AssetResource($this->assetRepository->updateUserAsset(Auth::id(), $id, $assetStoreRequest->validated())));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return response()->json(new AssetDeleteResource($this->assetRepository->destroyUserAsset($id, Auth::id())));
    }
}
