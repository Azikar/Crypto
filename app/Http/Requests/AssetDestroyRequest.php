<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Foundation\RequestFoundation;

class AssetDestroyRequest extends RequestFoundation
{
    public function rules(): array
    {
        return [
            'asset' => 'required|integer|exists:assets',
        ];
    }
}
