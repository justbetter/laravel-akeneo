<?php

namespace JustBetter\Akeneo\Models\Concerns\Api;

use Illuminate\Support\Collection;

trait HasAll
{
    public static function all(): Collection
    {
        $class = self::guessApiNamespace('All');

        return $class::request()->send();
    }
}
