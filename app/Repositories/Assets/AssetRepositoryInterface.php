<?php

declare(strict_types=1);

namespace App\Repositories\Assets;

use App\Models\Asset\AssetInterface;
use Illuminate\Database\Eloquent\Collection;

interface AssetRepositoryInterface
{
    public function getUserAsset(int $userId, int $assetId): ?AssetInterface;

    public function getUserAssetsWithTotals(int $userId, string $currency): array;

    public function destroyUserAsset(int $id, int $userId): bool;
}
