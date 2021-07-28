<?php

declare(strict_types=1);

namespace App\Enum;

class CurrencyEnum
{
    public const CURRENCIES = [
        'BTC',
        'ETH',
        'IOTA'
    ];

    public const CURRENCIES_FULL_NAMES = [
        'BITCOIN',
        'ETHEREUM',
        'IOTA'
    ];

    public const CURRENCIES_SHORTHANDS = [
        'BITCOIN' => 'BTC',
        'ETHEREUM' => 'ETH',
        'IOTA' => 'IOTA'
    ];

    public const USD = 'USD';
    public const EUR = 'EUR';
}
