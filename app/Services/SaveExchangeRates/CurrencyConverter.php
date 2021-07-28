<?php

declare(strict_types=1);

namespace App\Services\SaveExchangeRates;

class CurrencyConverter
{
    private array $converters;

    public function __construct(CurrencyConverterInterface ...$converters)
    {
        $this->converters = $converters;
    }

    public function convert(string $from, string $to, float $value): float
    {
        $converted = false;
        foreach ($this->converters as $converter) {
            if ($converter->supports($from, $to)) {
                $value = $converter->convert($value);
                $converted = true;
                break;
            }
        }

        if (!$converted) {
            throw new \Exception('could not convert');
        }

        return $value;
    }
}
