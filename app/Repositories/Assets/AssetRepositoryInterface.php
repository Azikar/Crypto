<?php

declare(strict_types=1);

namespace App\Repositories\Assets;

use Illuminate\Database\Eloquent\Model;

interface AssetRepositoryInterface
{
    public function getUserAsset(int $userId, int $assetId): ?Model;

    public function getUserAssetsWithTotals(int $userId, string $currency): array;

    public function destroyUserAsset(int $id, int $userId): bool;
}
