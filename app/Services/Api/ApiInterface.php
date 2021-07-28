<?php

declare(strict_types=1);

namespace App\Services\Api;

interface ApiInterface
{
    public function setUrl(string $url): self;

    public function execute(): array;
}
