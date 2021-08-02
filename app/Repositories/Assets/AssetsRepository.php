<?php

declare(strict_types=1);

namespace App\Repositories\Assets;

use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class AssetsRepository extends BaseRepository implements AssetRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        parent::__construct($model);
    }

    public function getUserAsset(int $userId, int $assetId): Model
    {
        return $this->baseQuery()->where('user_id', $userId)->findOrFail($assetId);
    }

    public function getUserAssetsWithTotals(int $userId, string $currency): array
    {
        return [
            'assets' => $this->baseQuery()->where('user_id', $userId)
                ->select([
                    'id',
                    'currency',
                    'value',
                    'label'
                ])
                ->selectRaw('`assets`.`value` * (SELECT rate from rates
            where `assets`.`currency` = `rates`.`label` and `rates`.`currency` = "'.$currency.'") as converted')
            ->get(),
            'total' => $this->baseQuery()->where('user_id', $userId)
                ->selectRaw('sum(`assets`.`value` * (SELECT rate from rates
            where `assets`.`currency` = `rates`.`label` and `rates`.`currency` = "'.$currency.'")) as total')
                ->first(),
            ];
    }

    public function destroyUserAsset(int $id, int $userId): bool
    {
        return $this->baseQuery()->where(
            [
                ['user_id', $userId],
                ['id', $id]
            ]
        )->firstOrFail()->delete();
    }

    public function updateUserAsset(int $userId, int $id, array $attributes): Model
    {
        $model = $this->getUserAsset($userId, $id);
        $model->fill($attributes)->save();

        return $model;
    }
}
