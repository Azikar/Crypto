<?php

declare(strict_types=1);

namespace App\Repositories\Rates;

use App\Models\Rates\RatesInterface;
use Illuminate\Database\Eloquent\Collection;

interface RatesRepositoryInterface
{
    public function createOrUpdate(array $match, array $values): void;
}
