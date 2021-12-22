<?php

namespace JustBetter\Akeneo\Models\Concerns\Api;

use Illuminate\Support\LazyCollection;

trait HasLazy
{
    public static function lazy(): LazyCollection
    {
        $class = self::guessApiNamespace('Lazy');

        return $class::request()->send();
    }
}
