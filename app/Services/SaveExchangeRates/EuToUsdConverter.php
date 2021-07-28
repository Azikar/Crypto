<?php

declare(strict_types=1);

namespace App\Services\SaveExchangeRates;

use App\Enum\CurrencyEnum;

class EuToUsdConverter implements CurrencyConverterInterface
{
    public function supports(string $from, string $to): bool
    {
        return ($from === CurrencyEnum::EUR && $to === CurrencyEnum::USD);
    }

    public function convert(float $value): float
    {
        return $value * (float) config('services.crypto.eu_to_usd');
    }
}
