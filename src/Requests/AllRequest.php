<?php

namespace JustBetter\Akeneo\Requests;

use Illuminate\Support\LazyCollection;

abstract class AllRequest
{
    public static function request(): static
    {
        return new static();
    }

    abstract public function send(): LazyCollection;
}
