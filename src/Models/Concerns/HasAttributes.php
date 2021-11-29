<?php

namespace JustBetter\Akeneo\Models\Concerns;

use JustBetter\Akeneo\Models\Attribute;

trait HasAttributes
{
    protected array $attributes = [];
    protected array $originalAttributes = [];

    public function __get(string $name): mixed
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }

        if (array_key_exists($name, $this->attributes['values'])) {
            if ($this->attributes['values'][$name] instanceof Attribute) {
                return $this->attributes['values'][$name];
            }

            $attribute = Attribute::find($name);

            $options = $this->attributes['values'][$name];

            $attribute->selected = $options;

            $values = $this['values'];
            $values[$name] = $attribute;
            $this['values'] = $values;

            return $attribute;
        }

        return null;
    }

    public function __set(string $name, mixed $value): void
    {
        $this->attributes[$name] = $value;
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

    public function getOriginal(string $name): mixed
    {
        return $this->originalAttributes[$name] ?? null;
    }
}
