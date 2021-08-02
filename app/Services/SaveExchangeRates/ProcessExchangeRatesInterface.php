<?php

declare(strict_types=1);

namespace App\Services\SaveExchangeRates;

interface ProcessExchangeRatesInterface
{
    public function execute(array $rates): array;
}
