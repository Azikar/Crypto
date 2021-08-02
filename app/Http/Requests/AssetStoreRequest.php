<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Enum\CurrencyEnum;
use App\Foundation\RequestFoundation;

class AssetStoreRequest extends RequestFoundation
{
    public function rules(): array
    {
        return [
            'asset' => 'required|integer',
            'label' => 'required|string',
            'value' => 'required|integer|min:0',
            'currency' => 'required|string|in:'. implode(',', CurrencyEnum::CURRENCIES),
        ];
    }
}
