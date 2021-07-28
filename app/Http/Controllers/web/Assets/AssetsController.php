<?php

declare(strict_types=1);

namespace App\Http\Controllers\web\Assets;

use App\Enum\CurrencyEnum;
use App\Http\Controllers\Controller;
use App\Repositories\Assets\AssetRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AssetsController extends Controller
{

    private AssetRepositoryInterface $assetRepository;

    public function __construct(AssetRepositoryInterface $assetRepository)
    {
        $this->assetRepository = $assetRepository;
    }

    public function index(): view
    {
        return view('assets.index', [
            'assets' => $this->assetRepository->getUserAssetsWithTotals(Auth::id(), config('services.conversion_currency')),
        ]);
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->assetRepository->destroyUserAsset($id, Auth::id());

        return redirect('/dashboard');
    }
}
