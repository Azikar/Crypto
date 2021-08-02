<?php

declare(strict_types=1);

namespace App\Repositories\Rates;

use App\Repositories\Base\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class RatesRepository extends BaseRepository implements RatesRepositoryInterface
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

    public function createOrUpdate(array $match, array $values): void
    {
        $this->baseQuery()->updateOrCreate($match, $values);
    }
}
