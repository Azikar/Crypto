<?php

declare(strict_types=1);

namespace App\Services\Api;

interface RequestUrlBuilderInterface
{
    public function build(array $ids, array $currencies): string;
}
