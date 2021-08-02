<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Foundation\RequestFoundation;

class AssetShowRequest extends RequestFoundation
{
    public function rules(): array
    {
        return [
            'asset' => 'integer|exists:assets,id',
        ];
    }
}
