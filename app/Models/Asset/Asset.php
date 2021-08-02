<?php

declare(strict_types=1);

namespace App\Models\Asset;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'currency',
        'value',
        'label',
        'user_id',
    ];
}
