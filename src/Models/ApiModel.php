<?php

namespace JustBetter\Akeneo\Models;

use ErrorException;
use Illuminate\Support\LazyCollection;

abstract class ApiModel
{
    protected $attributes = [];

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public static function all(): LazyCollection
    {
        $calledClass = class_basename(
            class: get_called_class()
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
        return $this->attributes[$name];
    }
}
