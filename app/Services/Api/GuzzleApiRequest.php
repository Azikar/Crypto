<?php

declare(strict_types=1);

namespace App\Services\Api;

use Illuminate\Support\Facades\Http;

class GuzzleApiRequest implements ApiInterface
{
    private string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function execute(): array
    {
        $response = Http::get($this->url)->json();

        return $response;
    }
}
