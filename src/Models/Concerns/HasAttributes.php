<?php

namespace JustBetter\Akeneo\Models\Concerns;

trait HasAttributes
{
    protected array $attributes = [];

    public function __get(string $name): mixed
    {
        return $this->attributes[$name] ?? null;
    }

    public function offsetGet($offset): mixed
    {
        return $this->attributes[$offset] ?? null;
    }

    public function offsetSet($offset, $value): void
    {
        $this->attributes[$offset] = $value;
    }

    public function offsetExists($offset): bool
    {
        return isset($this->attributes[$offset]);
    }

    public function offsetUnset($offset): void
    {
        unset($this->attributes[$offset]);
    }

    public function toArray(): array
    {
        return $this->attributes;
    }
}
