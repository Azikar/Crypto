<?php

declare(strict_types=1);

namespace App\Http\Controllers\web\Assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetStoreRequest;
use App\Repositories\Assets\AssetRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AssetsUpdateFormController extends Controller
{

    private AssetRepositoryInterface $assetRepository;

    public function __construct(AssetRepositoryInterface $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }

    public function show(int $id): view
    {
        return view('assets.update', ['asset' => $this->assetRepository->getUserAsset(Auth::id(), $id)]);
    }

    public function update(AssetStoreRequest $assetStoreRequest, int $id): RedirectResponse
    {
        $this->assetRepository->updateUserAsset(Auth::id(), $id, $assetStoreRequest->validated());

        return redirect('/dashboard');
    }
}
