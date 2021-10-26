<?php

namespace JustBetter\Akeneo\Models;

use ArrayAccess;
use ErrorException;
use Illuminate\Support\LazyCollection;

abstract class ApiModel implements ArrayAccess
{
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public static function all(): LazyCollection
    {
        $calledClass = class_basename(
            get_called_class()
        );

        $class = "JustBetter\\Akeneo\\Requests\\{$calledClass}\\All";

        if (! class_exists($class)) {
            throw new ErrorException(
                __('Class ":class" not found', ['class' => $class])
            );
        }

        return $class::request()->send();
    }

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
}
