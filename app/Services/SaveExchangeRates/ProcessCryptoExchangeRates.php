<?php

declare(strict_types=1);

namespace App\Services\SaveExchangeRates;

use App\Enum\CurrencyEnum;

class ProcessCryptoExchangeRates implements ProcessExchangeRatesInterface
{
    public function execute(array $rates): array
    {
        $ratesToSave = [];
        try {
            foreach ($rates as $label => $value) {
                foreach ($value as $currency => $rate) {
                    $ratesToSave[] = [
                        'label' => CurrencyEnum::CURRENCIES_SHORTHANDS[strtoupper($label)],
                        'currency' => strtoupper($currency),
                        'rate' => $rate
                    ];
                }
            }
        } catch (\Throwable $e) {
            // send notification to sentry or something like that
        }

        return $ratesToSave;
    }
}
