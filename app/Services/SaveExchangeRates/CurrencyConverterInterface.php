<?php

declare(strict_types=1);

namespace App\Services\SaveExchangeRates;

interface CurrencyConverterInterface
{
    public function supports(string $from, string $to): bool;

    public function convert(float $value): float;
}
