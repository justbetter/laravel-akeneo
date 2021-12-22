<?php

namespace JustBetter\Akeneo\Models\Concerns\Api;

use JustBetter\Akeneo\Exceptions\ModelNotFoundException;

trait HasFind
{
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
}
