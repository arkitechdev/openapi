<?php

namespace Arkitechdev\OpenApi;

use Arkitechdev\OpenApi\Traits\GetOrSet;

class Path
{
    use GetOrSet;

    protected $path;

    protected $requests = [];

    public function path($path = null): self|string
    {
        return $this->getOrSet('path', $path);
    }

    public function addRequest(Request $request): self
    {
        $this->requests[$request->method()] = $request;
        return $this;
    }

    public function toArray(): array
    {
        return collect($this->requests)->map->toArray()->all();
    }
}
