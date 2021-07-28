<?php

declare(strict_types=1);

namespace App\Http\Controllers\web\Assets;

use App\Http\Controllers\Controller;
use App\Http\Requests\AssetStoreRequest;
use App\Repositories\Assets\AssetRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AssetsCreateFormController extends Controller
{

    private AssetRepositoryInterface $assetRepository;

    public function __construct(AssetRepositoryInterface $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }

    public function index(): view
    {
        return view('assets.create');
    }

    public function store(AssetStoreRequest $assetStoreRequest): RedirectResponse
    {
        $data = $assetStoreRequest->validated();
        $data['user_id'] = Auth::id();
        $this->assetRepository->create($data);

        return redirect('/dashboard');
    }
}
