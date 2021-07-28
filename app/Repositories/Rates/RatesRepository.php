<?php

declare(strict_types=1);

namespace App\Repositories\Rates;

use App\Models\Rates\RatesInterface;
use App\Repositories\Base\BaseRepository;

class RatesRepository extends BaseRepository implements RatesRepositoryInterface
{
    /**
     * UserRepository constructor.
     *
     * @param RatesInterface $model
     */
    public function __construct(RatesInterface $model)
    {
        parent::__construct($model);
    }

    public function createOrUpdate(array $match, array $values): void
    {
        $this->baseQuery()->updateOrCreate($match, $values);
    }
}
