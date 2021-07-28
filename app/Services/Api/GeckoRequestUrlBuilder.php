<?php

declare(strict_types=1);

namespace App\Services\Api;

class GeckoRequestUrlBuilder implements RequestUrlBuilderInterface
{
    public function build(array $ids, array $currencies): string
    {
        return config('services.crypto.rates_url') . '?ids=' . implode(',', $ids) . '&vs_currencies=' . implode(',', $currencies);
    }
}
