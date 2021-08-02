<?php

declare(strict_types=1);

namespace App\Models\Rates;

use Illuminate\Database\Eloquent\Model;

class Rates extends Model
{
    protected $fillable = [
        'label',
        'currency',
        'rate'
    ];
}
