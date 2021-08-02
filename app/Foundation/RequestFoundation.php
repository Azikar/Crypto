<?php declare(strict_types=1);

namespace App\Foundation;

use Illuminate\Foundation\Http\FormRequest;

class RequestFoundation extends FormRequest
{
    public function getInt(string $key, ?int $default = null): ?int
    {
        return null !== $this->input($key) ? (int)$this->input($key) : $default;
    }

    public function getFloat(string $key, ?float $default = null): ?float
    {
        return null !== $this->input($key) ? (float)$this->input($key) : $default;
    }

    public function getString(string $key): ?string
    {
        return null !== $this->input($key) ? (string)$this->input($key) : null;
    }

    public function getArray(string $key, ?array $default = null): ?array
    {
        return null !== $this->input($key) ? (array)$this->input($key) : $default;
    }

    public function getBoolean(string $key): ?bool
    {
        return null !== $this->input($key) ? (bool)$this->input($key) : null;
    }

    public function rules(): array {
        return [];
    }

    public function getIntParam(string $key): ?int
    {
        return null !== $this->route($key) ? (int)$this->route($key) : null;
    }

    public function all($keys = null)
    {
        return array_replace_recursive(
            parent::all(),
            $this->route()->parameters()
        );
    }
}
