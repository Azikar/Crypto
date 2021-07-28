<?php

declare(strict_types=1);

namespace App\Entities;

class Currency
{
    public string $currency;

    public string $realCurrency;

    public float $rate;

    public function __construct(string $currency, string $realCurrency, float $rate)
    {
        $this->currency = $currency;
        $this->realCurrency = $realCurrency;
        $this->rate = $rate;
    }
}
