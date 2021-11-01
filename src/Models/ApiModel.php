<?php

namespace JustBetter\Akeneo\Models;

use ArrayAccess;
use ErrorException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Exceptions\ModelNotFoundException;
use JustBetter\Akeneo\Models\Concerns\HasAttributes;

abstract class ApiModel implements ArrayAccess, Arrayable
{
    use HasAttributes;

    public function __construct(array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public static function newCollection(array $models = []): Collection
    {
        return new Collection($models);
    }

    protected static function guessApiNamespace(string $type): string
    {
        $modelName = class_basename(
            get_called_class()
        );

        $class = "JustBetter\\Akeneo\\Requests\\{$modelName}\\{$type}";

        if (! class_exists($class)) {
            throw new ErrorException(
                __('Class ":class" not found', ['class' => $class])
            );
        }

        return $class;
    }

    public static function all(): Collection
    {
        $class = self::guessApiNamespace('All');

        return $class::request()->send();
    }

    public static function lazy(): LazyCollection
    {
        $class = self::guessApiNamespace('Lazy');

        return $class::request()->send();
    }

    public static function find(string $code): ?static
    {
        $class = self::guessApiNamespace('Find');

        return $class::request($code)->send();
    }

    public static function findOrFail(string $code): static
    {
        $model = self::find($code);

        if (! $model) {
            throw new ModelNotFoundException(
                __('No results for code ":code"', ['code' => $code])
            );
        }

        return $model;
    }

    public function save(): bool
    {
        $class = self::guessApiNamespace('Upsert');

        $data = $this->toArray();

        unset($data['code']);

        return $class::request($this['code'])->send($data);
    }
}
