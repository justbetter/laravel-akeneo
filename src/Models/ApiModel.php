<?php

namespace JustBetter\Akeneo\Models;

use ArrayAccess;
use BadMethodCallException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use JustBetter\Akeneo\Akeneo;
use JustBetter\Akeneo\Builders\QueryBuilder;
use JustBetter\Akeneo\Exceptions\ModelNotFoundException;
use JustBetter\Akeneo\Models\Concerns\HasAttributes;

/**
 * @mixin Product
 * @mixin ProductModel
 * @mixin QueryBuilder
 */
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

    public static function guessApiNamespace(string $type): string
    {
        return Akeneo::getRequestClass($type, new static);
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

        unset($data[$this->primaryKey]);

        return $class::request($this[$this->primaryKey])->send($data);
    }

    public function delete(): bool
    {
        $class = self::guessApiNamespace('Delete');

        return $class::request($this[$this->primaryKey])->send();
    }

    public static function query(): QueryBuilder
    {
        return (new static)->newQueryBuilder();
    }

    public function newQueryBuilder(): QueryBuilder
    {
        return new QueryBuilder($this);
    }

    public static function __callStatic(string $method, array $arguments): QueryBuilder
    {
        if (method_exists($builder = (new static)->newQueryBuilder(), $method)) {
            return $builder->$method(...$arguments);
        }

        throw new BadMethodCallException(
            __('Method `:method` does not exist on class `:class`', ['method' => $method, 'class' => get_class($builder)])
        );
    }
}
